<?php 
session_start(); 
$req_upto_date=$_POST['req_upto_date'];
if(isset($req_upto_date))
{
    include '../admin/database.php'; 
    $db = new Database(); 
    // $db->select('tbl_book_details',"tbl_bk.id,tbl_bk.book_name,tbl_bk.author_name,tbl_bk.quantity,tbl_bk_req.id as bk_req_id,tbl_bk_req.request_date,
    // tbl_bk_req.status,tbl_user.name,tbl_fclty.desig,tbl_fclty.phone",' 
    // tbl_bk JOIN tbl_book_reference_no tbl_bk_ref ON tbl_bk.id =tbl_bk_ref.tbl_book_id 
    // LEFT JOIN tbl_book_request_issue tbl_bk_req ON tbl_bk_req.book_id =tbl_bk.id JOIN tbl_user ON tbl_user.id =tbl_bk_req.user_id join tbl_faculty_master as tbl_fclty 
    // on tbl_fclty.user_id= tbl_user.id','tbl_bk_req.request_date <= "'.$req_upto_date.'" and tbl_bk_req.status >= "1"
    // GROUP BY bk_req_id',null,null); 
    $db->select('tbl_book_details',"tbl_bk.id,tbl_bk.book_name,tbl_bk.author_name,tbl_bk.quantity,tbl_bk_req.id as bk_req_id,tbl_bk_req.request_date,
    tbl_bk_req.status,tbl_user.name,tbl_fclty.desig,tbl_fclty.phone,tbl_trainee.phone as t_phone,tbl_bk_req.issue_date,tbl_bk_req.no_of_days",' 
    tbl_bk JOIN tbl_book_reference_no tbl_bk_ref ON tbl_bk.id =tbl_bk_ref.tbl_book_id 
    LEFT JOIN tbl_book_request_issue tbl_bk_req ON tbl_bk_req.book_id =tbl_bk.id JOIN tbl_user ON tbl_user.id =tbl_bk_req.user_id left outer join tbl_new_recruite as tbl_trainee 
    on tbl_trainee.user_id= tbl_bk_req.user_id left outer join tbl_faculty_master as tbl_fclty 
    on tbl_fclty.user_id= tbl_bk_req.user_id','tbl_bk_req.request_date <= "'.$req_upto_date.'" and tbl_bk_req.status >= "1"
    GROUP BY tbl_bk_req.id',null,null); 
    $res_book = $db->getResult();
}
else{
  $res_book=array();
}
?>
 <table id="book_table" class="table">
                            <thead class="" style="background: #315682;color:#fff;">
                            <th style="width:50px;">Sl No</th>
                            <th>Date</th>
                            <th>Name </th>
                            <th>Designation</th>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>Phone</th>
                            <th>Issue Date</th>
                            <th>No of Days</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                           // print_r($res_book);
                            $sl_no=1;
							
                           foreach($res_book as $res)
                           {
                            $id=$res['id'];
                            $bk_req_id=$res['bk_req_id'];
                            $request_date=$res['request_date'];
                            $name=$res['name'];
                            $book_name=$res['book_name'];
                            $author_name=$res['author_name'];
                            $issue_date=$res['issue_date'];
                            $no_of_days=$res['no_of_days'];
                            $designation=$res['desig'];
                            if(!empty($designation))
                            {
                                $desig=$designation;
                            }
                            else{
                                $desig="Trainee";
                            }
                            $phone_num=$res['phone'];
                            $t_phone=$res['t_phone'];
                            if(!empty($phone_num))
                            {
                                $phone=$phone_num;
                            }
                            elseif(!empty($t_phone)){
                                $phone=$t_phone;
                            }                     
                            ?>
                            <tr>
                                <td><?php echo $sl_no++;?></td>
                                <td><?php echo date('d-m-Y',strtotime($request_date))?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $desig?></td>
                                <td><?php echo $book_name?></td>
                                <td><?php echo $author_name?></td>
                                <td><?php echo $phone?></td>
                                <?php   $sql = 'SELECT * FROM tbl_book_request_issue WHERE id= "'.$bk_req_id.'"';
                               $res_book= $db->select_sql_row($sql);
                               if(!empty($res_book))
                               {
                                $issue_date=$res_book->issue_date;
                                $no_of_days=$res_book->no_of_days;
                                $status=$res_book->status;
                               }
                               else{
                                $issue_date='';
                                $no_of_days='';
                                $status='';
                               }
                                //$row = $db->fetch_row();
                                //echo $status=$row['status']; 
                               //echo $issue_date=$row['issue_date']; 
                               //echo $no_of_days=$row['no_of_days']; 
                                ?>
                                <td><?php if(isset($issue_date) && $issue_date !="0000-00-00")
                                {
                                    echo date('d-m-Y',strtotime($issue_date));
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
                                $db->select('tbl_book_request_issue',"*",null,'id= "'.$bk_req_id.'"',null,null);
                                $res_book = $db->getResult();
                                if(!empty($res_book) && $status==1)
                                { ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" style="padding: 10px 10px;"
                                data-target="#detailsModal_<?php echo $bk_req_id; ?>">
                                Issue Book
                                </button>
                                <?php }
                               else if(!empty($res_book) && $status==2)
                               { ?>
                               <span style="color:#2ecc71;padding-right:5px;font-size: 15px;font-weight: 700">Book Issued</span>     
                              <?php }
                              else if(!empty($res_book) && $status==3)
                              { ?>
                                <span style="color:#e96b00;padding-right:5px;font-size: 15px;font-weight: 700">Book Not Available</span>
                             <?php }
                              ?>
                                </form>
                                </td>
                            </tr>
                      
                            <div id="detailsModal_<?php echo $bk_req_id; ?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width:200%;margin-left: -33%;">
                            <div class="modal-header"
                                style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, #00acc1 0%, #1abc9c 100%);;color: #fff;">
                                <h5 class="modal-title" id="m_title" style="color:#fff" style="text-align:center;"> Book
                                    Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="frm_add_<?=$id?>">
                                    <input type="hidden" id="update_id_<?=$id?>" value="<?=isset($id)?$id:'';?>" />
                                    <input type="hidden" id="update_id_<?=$bk_req_id?>" value="<?=isset($bk_req_id)?$bk_req_id:'';?>" />
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding:1%">
                                        <div class="col-3">
                                            <label>Reference No :</label>
                                            <?php 
                                $db->select('tbl_book_reference_no',"*",null,'tbl_book_id= "'.$id.'" and status=0',null,null);
                                $res_book_ref = $db->getResult();
                                //print_r($res_book_ref);
                                ?>   
                    
                                        <select class="form-control me-2" aria-label="Default select example" id="book_ref_no_<?php echo $bk_req_id; ?>" name="book_ref_no">
                                        <option value="">Select Reference No.</option>
                                        <?php 
                                        if($res_book_ref){
                                        foreach($res_book_ref as $res_ref)
                                        { 
                                        $reference_no=$res_ref['reference_no']; 
                                        $reference_id=$res_ref['id']; 
                                         ?>
                                        <option value="<?php echo $reference_id?>"><?php echo $reference_no?></option>
                                        <?php }
                                        }  ?>
                                        </select>
                                        </div>
                                        <div class="col-5" >
                                            <label>Date :</label>
                                            <input class="form-control" type="date" name="issue_date" id="issue_date_<?php echo $bk_req_id; ?>" placeholder="Issue date"  value="<?php echo date('Y-m-d');?>" required>
                                        </div>
                                        
                                        <div class="col-4" >
                                            <label>No.of days:</label>
                                            <input class="form-control me-3" name="no_of_days" id="no_of_days_<?php echo $bk_req_id; ?>" value="" placeholder="Enter No. of days" required>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="modal-footer" id="m_footer">
                                <input type="submit" class="btn btn-primary" value="Issue" id="<?=$bk_req_id?>" onclick="issue_book_request(this)">
                                <input type="submit" class="btn btn-warning" value="Reject Request" id="<?=$bk_req_id?>" onclick="reject_book_request(this)">
                                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php   }
                            ?>
                            </tbody>
                            </table>
<script>
function issue_book_request(data)
{
    var req_bk_id=data.id;
    var request_date= '<?php echo $request_date ;?>';
    var req_upto_date= '<?php echo $req_upto_date ;?>';
    var book_ref_id = $('#book_ref_no_'+req_bk_id).val();
    var issue_date = $('#issue_date_'+req_bk_id).val();
    var no_of_days = $('#no_of_days_'+req_bk_id).val();
    $.ajax({
        type: "POST",
        url: "ajax_case_master.php",
        data: { 'action':'update_issue_tbl','ref_update_id':book_ref_id,'request_date':request_date,'issue_date':issue_date,'no_of_days':no_of_days,'issue_update_id':req_bk_id,'table1':'tbl_book_request_issue','table2':'tbl_book_reference_no'},
        success: function(res) {
         // alert(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                 get_member_request_book_list(req_upto_date);
                 //$('.modal-backdrop').remove();
                sessionStorage.message = "Book is issued successfully";
                sessionStorage.type = "success";
                showMessage();
                $('.modal-backdrop').remove();
            }else{
                sessionStorage.message = elm[1];
                sessionStorage.type = "error";
                showMessage();
                $('.modal-backdrop').remove();
            }
        }
    })
}
function reject_book_request(data)
{
    var req_bk_id=data.id;
    var req_upto_date= '<?php echo $req_upto_date ;?>';
    $.ajax({
        type: "POST",
        url: "ajax_case_master.php",
        data: { 'action':'update_manual','update_id':req_bk_id,'status':3,'table':'tbl_book_request_issue'},
        success: function(res) {
           console.log(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                 get_member_request_book_list(req_upto_date);
                 //$('.modal-backdrop').remove();
                sessionStorage.message = "Sent notification successfully";
                sessionStorage.type = "success";
                showMessage();
                //location.reload();
                $('.modal-backdrop').remove();
            }
        }
    })
}
</script>

