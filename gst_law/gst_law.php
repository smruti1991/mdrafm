<?php
include('../admin/database.php');
$db = new Database();
  
   $sql  = "SELECT * FROM  `tbl_gst_case_law` GROUP BY party_name";

   $db->select_sql($sql);

   $result = $db->getResult();

   foreach($result as $row1){
    
     $db->update('tbl_case_ref',['case_id'=>$row1['id']],"party_name ='".$row1['party_name']."' ");
     $res = $db->getResult();
     print_r($res);
     
   
     //exit;            
    

   }
?>