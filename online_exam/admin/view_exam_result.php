<?php
include('database.php');
$object = new database();
$exam_id=$_POST['exam_id']; 
$user_id=$_POST['user_id'];      
$name=$_POST['name'];  
  
?>
<span id="error"></span>
<!-- Page Heading -->
<!-- DataTales Example -->
<span id="message"></span>

<?php
  //print_r($_POST);
  $exam_name = '';
  $paper_name = '';

   $object->query = "
   SELECT m.exam_title,p.prg_name,CONCAT(a.paper_code, ' ',a.title) as paper FROM `tbl_exam_master` m 
    JOIN `tbl_program_master` p ON m.program_id = p.id
    JOIN `tbl_paper_master` a ON m.paper_id = a.id
    WHERE m.id = ".$exam_id;

    $exam_result = $object->get_result();
    foreach($exam_result as $exam_row){
        $exam_name = $exam_row['exam_title'];
        $paper_name =$exam_row['paper'];
    }
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h7 class="m-0" style="color:#1a1818"> Name : <b><?php echo $name; ?></b></h7>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <h7 class="m-0" style="color:#1a1818"> Exam Name : <b><?php echo $exam_name; ?></b></h7>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <h7 class="m-0" style="color:#1a1818"> Paper Name : <b><?php echo $paper_name; ?></b></h7>
            </div>
        </div>
    </div>
    
        <div class="table-responsive" >
        <table class="table table-bordered" id="exam_result" width="100%" cellspacing="0" style="color: #3d3e46;">
                <thead style="background-color:#3996c1;color:white">
                    <tr>
                        <th>Sl</th>
                        <th>Question Name</th>
                        <th>Answer</th>
                        <th>Mark</th>
                    </tr>
                </thead>
                <tbody style="background-color:azure">
                  <?php
                    $object->query = "
                    SELECT i.id,q.exam_subject_question_title,a.marks,a.status as ans_status FROM `tbl_trainee_exam_info` i 
                    JOIN `tbl_exam_question_answer` a ON i.id = a.trainee_exam_info_id
                    JOIN `exam_subject_question` q ON a.exam_question_id =  q.exam_subject_question_id 
                    WHERE i.exam_id = '".$exam_id."' AND i.trainee_id = '".$user_id."'
                    ";

                    $mark_result = $object->get_result();
                    //print_r($mark_result);
                    $count = 0;
                    $final_mark = 0;
                    foreach($mark_result as $mark_row){
                        $count++;
                         $n = (int)($mark_row['marks']) ;
                       $final_mark= $final_mark + $n;
                     ?>
                     <tr>

                    
                        <td><?php echo $count ?></td>
                        <td><?php echo $mark_row['exam_subject_question_title'] ?></td>
                        <td>
                            <?php 
                            
                            switch ($mark_row['marks']) {
                                
                                case '+1':
                                    echo '<span class="text-success" > Correct</span>';
                                    break;
                                case '0':
                                    echo '<span class="text-danger" > Wrong</span>';
                                    break;
                                default:
                                    echo '<span class="text-warning" >Not attended</span>';
                                    break;
                            }
                            ?>
                        </td>

                        <td><?php if(!empty($mark_row['marks']))
                        {
                            echo $mark_row['marks'];
                        }
                        else{
                            echo '0';
                        }?></td>
                        </tr>
                     <?php
                    }
                    
                    echo '<tr>
                         <td></td>
                         <td></td>
                         <td>Total</td>
                         <td>'. $final_mark.'</td>
                    <tr>';
                  ?>
                </tbody>
            </table> 
        </div>
  





<script>

$(document).ready(function() {
       $('#exam_table').DataTable();
});


</script>