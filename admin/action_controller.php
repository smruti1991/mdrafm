<?php 
  
  include 'utility.php';
  include 'database.php';

  $db = new Database();
  $utl = new Utility;

  //print_r($_POST);
  
  if ( isset($_POST['action']) && $_POST['action'] == 'register_trainee'){
      
    $subject = $_POST['subject']; 
    $email_body = $_POST['email_body'];
    $email = $_POST['email'];

    $name = $_POST['name'];
    $newstring = substr($_POST['phone'], 5);
    $username = trim($_POST['phone']);
    $pass = "Mdrafm@".$newstring;
    $psw = trim($pass);
    $encryptedpass = password_hash($psw,PASSWORD_BCRYPT);

    $msg = '';
    
    $db->update('tbl_dept_trainee_registration',["mail_status"=> 1],'id='.$_POST['traine_id']);
   $res4= $db->getResult();
   //print_r($res);
    if($res4){

        $db->select('tbl_user','*',null,'username = "'.$username.'" ',null,null);
        $res = $db->getResult();
        //  print_r($res);
        //  exit;
        if($res){
            $roll_id = 4;
          foreach($res as $row){

            $rolls = explode(',', $row['roll_id']);
            if(in_array('4',$rolls)){
              $roll = $row['roll_id'];
            }else{
              $roll = $row['roll_id'].','.$roll_id;
            }
            $db->update('tbl_user',['roll_id'=>$roll,'password'=>$encryptedpass,'status'=>1],"id=".$row['id']);
            $res1= $db->getResult();
            if($res1){
                $attachment = array();
                $email_body =  $email_body."<br><h3>MDRAFM Login</h3> </br><p>User name: <strong>$username</strong><p></br><p>Password: <strong>$pass</strong><p>";
                $res = $utl->mail($email, $subject, $email_body, $attachment);
                if($res){
                    $msg  = 'success';
                }else{
                    $msg= 'error';
                }
            }
           }
        }
        else{
            
          $insert_sql = "INSERT INTO tbl_user (roll_id,username,name,email,password) VALUES ( 4,'$username','$name','$email','$encryptedpass' ) " ;
          $db->insert_sql($insert_sql);
          $res2= $db->getResult();
          if($res2){
                $attachment = array();
                $email_body =  $email_body."<br><h3>MDRAFM Login</h3> </br><p>User name: <strong>$username</strong><p></br><p>Password: <strong>$pass</strong><p>";
                $res = $utl->mail($email, $subject, $email_body, $attachment);
                if($res){
                    $msg  = 'success';
                }else{
                    $msg= 'error';
                }
          }else{
            $msg= 'error';
        }
        }
   }else{
     echo "Error";
   }

   echo  $msg;
    
  }


?>