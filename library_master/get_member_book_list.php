<?php 
session_start(); 
$subject_id=$_POST['subject_id'];
$book_name=$_POST['book_name'];
$user_id=$_SESSION['user_id'];
if(isset($subject_id) && empty($book_name))
{
    include '../admin/database.php'; 
    $db = new Database(); 
    $db->select('tbl_book_details',"tbl_bk.id,tbl_bk.book_name,tbl_bk.author_name,tbl_bk.quantity,tbl_bk_req.id as bk_req_id,
    tbl_bk_req.status,tbl_bk_req.issue_date,tbl_bk_req.no_of_days,tbl_bk_req.request_date",' tbl_bk JOIN tbl_book_reference_no tbl_bk_ref ON tbl_bk.id =tbl_bk_ref.tbl_book_id 
    LEFT JOIN tbl_book_request_issue tbl_bk_req ON tbl_bk_req.book_id =tbl_bk.id and tbl_bk_req.user_id= "'.$user_id.'"','tbl_bk.book_type= "'.$subject_id.'"  
    GROUP BY tbl_bk.id',null,null); 
}else if(isset($book_name) && empty($subject_id))
{
    include '../admin/database.php'; 
    $db = new Database(); 
    $db->select('tbl_book_details',"tbl_bk.id,tbl_bk.book_name,tbl_bk.author_name,tbl_bk.quantity,tbl_bk_req.id as bk_req_id,tbl_bk_req.status,
    tbl_bk_req.issue_date,tbl_bk_req.no_of_days,tbl_bk_req.request_date",' tbl_bk JOIN tbl_book_reference_no tbl_bk_ref ON tbl_bk.id =tbl_bk_ref.tbl_book_id
     LEFT JOIN tbl_book_request_issue tbl_bk_req ON tbl_bk_req.book_id =tbl_bk.id','tbl_bk.book_name= "'.$book_name.'" 
    GROUP BY tbl_bk.id',null,null);
}
else if(isset($subject_id) && isset($book_name))
{
    include '../admin/database.php'; 
    $db = new Database(); 
    $db->select('tbl_book_details',"tbl_bk.id,tbl_bk.book_name,tbl_bk.author_name,tbl_bk.quantity,tbl_bk_req.id as bk_req_id,tbl_bk_req.status,
    tbl_bk_req.issue_date,tbl_bk_req.no_of_days,tbl_bk_req.request_date",' tbl_bk JOIN tbl_book_reference_no tbl_bk_ref ON tbl_bk.id =tbl_bk_ref.tbl_book_id 
    LEFT JOIN tbl_book_request_issue tbl_bk_req ON tbl_bk_req.book_id =tbl_bk.id','tbl_bk.book_type= "'.$subject_id.'" 
    and tbl_bk.book_name= "'.$book_name.'" GROUP BY tbl_bk.id',null,null);
}
$res_book = $db->getResult();
//print_r($res_book);

?>
 <table id="case_law" class="table">
                            <thead class="" style="background: #315682;color:#fff;">
                            <th style="width:50px;">Sl No</th>
                            <th >Book Name </th>
                            <th >Author Name</th>
                            <th>quantity</th>
                            <th>Request Date</th>
                            <th>Issue Date</th>
                            <th>No of Days</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                           // print_r($res_book);
                            $sl_no=1;
							$book_list = array();
                           foreach($res_book as $res)
                           {
                            $id=$res['id'];
                            $bk_req_id=$res['bk_req_id'];
                            $book_name=$res['book_name'];
                            $author_name=$res['author_name']; 
						    array_push($book_list,$book_name);
                            $issue_date=$res['issue_date'];
                            $no_of_days=$res['no_of_days'];
                            $quantity=$res['quantity'];
                            $request_date=$res['request_date'];
                            ?>
                            <tr>
                                <td><?php echo $sl_no++;?></td>
                                <td><?php echo $book_name?></td>
                                <td><?php echo $author_name?></td>
                                <td><?php echo $quantity?></td>
                                <?php 
                               // $db->select('tbl_book_request_issue',"*",null,'book_id= "'.$id.'" and user_id ="'.$user_id.'"',null,null);
                                //$res_book = $db->fetch_row(); 
                                $sql = 'SELECT * FROM tbl_book_request_issue WHERE id= "'.$bk_req_id.'" and user_id ="'.$user_id.'"';
                               $res_book= $db->select_sql_row($sql);
                              // print_r($res_book);
                               if(!empty($res_book))
                               {
                                $issue_date=$res_book->issue_date;
                                $no_of_days=$res_book->no_of_days;
                                $status=$res_book->status;
                                echo $request_date=$res_book->request_date;
                               }
                               else{
                                $issue_date='';
                                $no_of_days='';
                                $status='';
                                $request_date='';
                               }
                                //$row = $db->fetch_row();
                                //echo $status=$row['status']; 
                               //echo $issue_date=$row['issue_date']; 
                               //echo $no_of_days=$row['no_of_days']; 
                                ?>
                                 <td><?php if(!empty($request_date))
                                {
                                    echo date('d-m-Y',strtotime($request_date));
                                }
                               else
                               {
                                    echo "";
                               } ?> </td>
                                <td><?php if(isset($issue_date) && $issue_date !="0000-00-00")
                                {
                                    echo $issue_date;
                                }
                               else
                               {
                                    echo "";
                               } ?> </td>
                                <td>
                                <?php if(isset($no_of_days) && $no_of_days !="0")
                                {
                                    echo $no_of_days;
                                }
                               else
                               {
                                    echo "";
                               } ?> 
                              </td> 
                                <td>
                                <form id="frm_insert">
                                <?php //echo $_SESSION['user_id']; ?>
                                <input type="hidden" name="book_id" value="<?=$id?>" id="book_id_<?=$id?>"/>
                               <?php
                                if(!empty($res_book) && $status==0)
                                { ?>
                               <span style="color:#2ecc71;padding-right:5px;font-size: 15px;font-weight: 700">Book Request sent</span>
                               <input type="button" class="btn btn-danger" value="Cancel" id="<?=$bk_req_id?>" onclick="cancel_book_request(this)"/>
                               <?php }
                               else if(!empty($res_book) && $status==1)
                               { ?>
                               <span style="color:#2ecc71;padding-right:5px;font-size: 15px;font-weight: 700;color:#df7419">Request verified</span>     
                              <?php }
                              else if(!empty($res_book) && $status==2)
                              { ?>
                              <span style="color:#2ecc71;padding-right:5px;font-size: 15px;font-weight: 700;color:#1aaf08">Book Issued</span>     
                             <?php }
                              else if(!empty($res_book) && $status==3)
                              { ?>
                              <span style="color:#2ecc71;;font-size: 15px;font-weight: 700;color:#e96b00">Book Not available</span>     
                             <?php }
                               else{ ?>
                                 <input type="button" class="btn btn-primary" value="Book Request" id="<?=$id?>" onclick="book_request(this)"/>
                              <?php } ?>
                              
                                </form>
                                </td>
                                
                            </tr>
                        <?php   }
                            ?>
                            </tbody>
                            </table>
                    
<script>
    function book_request(data) { 
     var bk_id=data.id;
     var user_id= '<?php echo $_SESSION['user_id']; ?>';
     var request_date= '<?php echo date("Y-m-d");?>';
     var book_id = $('#book_id_'+bk_id).val();
     var subject_id= '<?php echo $subject_id ;?>';
     var book_name= '';
    $.ajax({
        method: "POST",
        url: "ajax_case_master.php",
        data:{'user_id':user_id,'book_id':book_id,'request_date':request_date,'action':'add_master','update_id':'','table':'tbl_book_request_issue'} ,
        success: function(res) {
           //alert(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                get_member_book_list(subject_id,book_name); 
                sessionStorage.message = "Book issue request are successfully sent.";
                sessionStorage.type = "success";
                showMessage();    
               // location.reload();    
            }

        }
    })
}
function cancel_book_request(data)
{
    var auto_bk_id=data.id;
    var subject_id= '<?php echo $subject_id ;?>';
     var book_name= '';
    $.ajax({
        type: "POST",
        url: "ajax_case_master.php",
        data: {
            action: "delete_data",
            delete_id: auto_bk_id,
            table: "tbl_book_request_issue",
        },

        success: function(res) {
           console.log(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                get_member_book_list(subject_id,book_name);
                sessionStorage.message = "Book request is canceled successfully";
                sessionStorage.type = "error";
                showMessage();
                //location.reload();
            }
        }
    })
}
</script>

