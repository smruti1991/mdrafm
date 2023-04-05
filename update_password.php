<?php
  include('config.php');
 
 
    //echo "123";
    $username = 'admin';
    $password = 'Mdrafm@2022';
   

	$encryptedpass = password_hash($password,PASSWORD_BCRYPT);
	$update_sql = "UPDATE tbl_gst_case_user SET password = '$encryptedpass' WHERE username = '$username' " ;
	//echo $insert_sql;exit;
	$update_res = mysqli_query($db,$update_sql);
    print_r($update_res);
	if(mysqli_affected_rows($db) > 0){
		header("Location: login.php");
		die();
	}else{
	  $msg = "database error".$db->error;
	}
    
    
 
  

  

?>