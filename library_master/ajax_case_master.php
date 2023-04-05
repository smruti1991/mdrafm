<?php
include('../admin/database.php');
$db = new Database();

$pos = array_search("action",array_keys($_POST));
$frm_data = array_splice($_POST,0,$pos);
if(isset($_POST['action']) && $_POST['action'] == 'add_master'){
      
    $update_id =$_POST['update_id'];
    $table = $_POST['table']; 
     //update
    if ($update_id != '' ){
     
       $db->update($table, $frm_data,'id='.$update_id);
       $res = $db->getResult();
      
        if($res){
            echo "success#".$res[1];
        }
        else{
         
          echo "error#".$res[0];
        }
        
    }
    //add
    else{
     // echo 123;
    // print_r($frm_data);
        $db->insert($table, $frm_data);

       $res = $db->getResult();
       //print_r($res);
      if($res){
          echo "success#".$res[1];
      }
      else{
        //print_r($db->getResult());
        echo "error#".$res[0];
      }
    }
    
  }
  //remove case(update status only)
  if(isset($_POST['action']) && $_POST['action'] == 'remove_case'){
    $case_id = $_POST['case_id'];
    $table = $_POST['table'];

    $db->update($table, ["status" => 0 ],'id='.$case_id);
    $res = $db->getResult();
   // print_r($res);
    if($res){
        echo "success#".$res[1];
    }
    else{
        //print_r($db->getResult());
        echo "error#".$res[0];
    }
  }
  //Delete book(update status only)
  if(isset($_POST['action']) && $_POST['action'] == 'delete_case'){
    $book_id = $_POST['book_id'];
    $table = $_POST['table'];

    $db->update($table, ["status" => 1 ],'id='.$book_id);
    $res = $db->getResult();
   // print_r($res);
    if($res){
        echo "success#".$res[1];
    }
    else{
        //print_r($db->getResult());
        echo "error#".$res[0];
    }
  }
  //Delete from table 
  if(isset($_POST['action']) && $_POST['action'] == 'delete_data'){
    $delete_id = $_POST['delete_id'];
    $table = $_POST['table'];

    $db->delete($table,'id='.$delete_id);    
    $res = $db->getResult();
   //print_r($res);
    if($res){
        echo "success#".$res[0];
    }
    else{
        //print_r($db->getResult());
        echo "error#".$res[1];
    }
  }
  //update status of book request table 
  if(isset($_POST['action']) && $_POST['action'] == 'update_manual'){
    $update_id = $_POST['update_id'];
    $status = $_POST['status'];
    $table = $_POST['table'];

    $db->update($table, ["status" => $status ],'id='.$update_id);
    $res = $db->getResult();
   // print_r($res);
    if($res){
        echo "success#".$res[1];
    }
    else{
        //print_r($db->getResult());
        echo "error#".$res[0];
    }
  }
   //update status of book issue table 
   if(isset($_POST['action']) && $_POST['action'] == 'update_issue_tbl'){
    $ref_update_id = $_POST['ref_update_id'];
    $issue_update_id = $_POST['issue_update_id'];
    $issue_date = $_POST['issue_date'];
    $request_date = $_POST['request_date'];
    $no_of_days = $_POST['no_of_days'];
    $table1 = $_POST['table1'];
    $table2 = $_POST['table2'];
    if($issue_date < $request_date)
    {
      echo "error#Issue date should be greater than request date";
    }else
    {
      $db->update($table1, ["bk_ref_id" => $ref_update_id,"issue_date" => $issue_date,"no_of_days" => $no_of_days,"status" => 2],'id='.$issue_update_id);
      $res1 = $db->getResult();
      if($res1)
      {
        $db->update($table2, ["status" => 1 ],'id='.$ref_update_id);
        $res2 = $db->getResult();
      }
      if($res2){
          echo "success#".$res2[1];
      }
      else{
          //print_r($db->getResult());
          echo "error#".$res2[0];
      }
    }
  }
?>