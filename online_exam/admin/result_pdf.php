<?php
include_once('../../tcpdf/tcpdf.php');
include('../../admin/database.php');
$object = new Database();

$exam_id=$_POST['exam_id']; 
$user_id=$_POST['traniee_user_id'];      
$name=$_POST['name'];  
$Qset =$_POST['Qset'];

$exam_name = '';
$paper_name = '';

   $sql = "
   SELECT m.exam_title,p.prg_name,CONCAT(a.paper_code, ' ',a.title) as paper FROM `tbl_exam_master` m 
    JOIN `tbl_program_master` p ON m.program_id = p.id
    JOIN `tbl_paper_master` a ON m.paper_id = a.id
    WHERE m.id = ".$exam_id;
    $object->select_sql($sql);

    $exam_result = $object->getResult();
    foreach($exam_result as $exam_row){
        $exam_name = $exam_row['exam_title'];
        $paper_name =$exam_row['paper'];
    }



$sql_result = "
SELECT i.id,q.exam_subject_question_title,q.exam_subject_question_answer,a.trainee_ans_option,a.marks,a.status as ans_status FROM `tbl_trainee_exam_info` i 
JOIN `tbl_exam_question_answer` a ON i.id = a.trainee_exam_info_id
JOIN `exam_subject_question` q ON a.exam_question_id =  q.exam_subject_question_id 
WHERE i.exam_id = '".$exam_id."' AND i.trainee_id = '".$user_id."'
";

$object->select_sql($sql_result);

$mark_result = $object->getResult();

$count = 0;
$final_mark = 0;
$res = '';

foreach($mark_result as $mark_row){
    $count++;
     $n = (int)($mark_row['marks']) ;
   $final_mark= $final_mark + $n;
   
   $res .= '<tr>

        <td style="border: 1px solid black; width:10%">'.$count.'</td>
        <td style="border: 1px solid black; width:80%" >'.$mark_row['exam_subject_question_title'].'</td>

        </tr>';
   
}

$suggestion =  '<table align="left" width="100%" style="text-align:left;border: 1px solid black;">


                <tr style="border: 1px solid black;" >
                    <th  style="border: 1px solid black; width:10%">Sl No</th>
                    <th  style="border: 1px solid black; width:80%">Question </th>
                    
                </tr>

                '
                .$res.
                '

                </table>';


//print_r($suggestion);
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetAuthor('Nicola Asuni');
$obj_pdf->SetTitle('TCPDF Example 003');
$obj_pdf->SetSubject('TCPDF Tutorial');
$obj_pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$obj_pdf->SetTitle("Result");
$obj_pdf->SetDefaultMonospacedFont('helvetica');

$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 10);

$obj_pdf->AddPage();

// set some text to print
$title = '<h2  align="center" style="font-size:18px;">Individual Result</h2> <hr>';
$obj_pdf->Ln(15.5);
$obj_pdf->writeHTML($title,true, false, true, false, '');

 $Name = '<p style="font-size:18px;">Name : '.$name.'</p>';
 $obj_pdf->Ln(10);
 $obj_pdf->writeHTML($Name,true, false, true, false, '');

 $exam_name = '<p style="font-size:18px;">Name : '.$exam_name.'</p>';
 $obj_pdf->Ln(10);
 $obj_pdf->writeHTML($exam_name,true, false, true, false, '');

 $paper_name = '<p style="font-size:18px;">Name : '.$paper_name.'</p>';
 $obj_pdf->Ln(10);
 $obj_pdf->writeHTML($paper_name,true, false, true, false, '');

 //$obj_pdf->AddPage();
 $title2 = '<h2  align="center" style="font-size:18px;">Questions  ( Set -'.$Qset.')</h2> <hr>';
 $obj_pdf->Ln(15.5);
 $obj_pdf->writeHTML($title2,true, false, true, false, '');
 
 $obj_pdf->Ln(15.5);
 $obj_pdf->writeHTML($suggestion,true, false, true, false, '');

 $obj_pdf->SetX(15);


 $obj_pdf->Output('result.pdf', 'I');
