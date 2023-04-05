<?php 
//include 'database.php';

//include required phpmailer files
require '../PHPMailer/PHPMailer.php'; 
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';
// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Utility{
    
    public function mail($email,$subject,$body,$attch=array()){
                
                // create instance of phpmailer
            $mail = new PHPMailer();
            // set mailer to use smtp
            $mail->isSMTP();
            //define smtp host
            $mail->Host = "smtp.gmail.com";
            //enable smtp authentication
            $mail->SMTPAuth ="true";
            //set type of encryption(ssl/tls)
            $mail-> Port = "587";
            //set gmail Username
            $mail->Username = "mdrafm.fin@gmail.com";
            //set gmail password
            $mail->Password = "dzqcpwqjlwrkvbgj";

            
             //Set sender email
             $mail->setFrom("mdrafm.fin@gmail.com");
             $mail->FromName = "MDRAFM";
             //$mail->SMTPDebug  = 1;

            //Attachments
            //$mail->addAttachment($latter);         //Add attachments
            //$mail->addAttachment($anx1, 'anx1');    //Optional name


            //Enable HTML
            $mail->isHTML(true);
            //Unescape the string values in the JSON array
            $mail->Subject = $subject;
            $mail->Body = $body;
            //add recipients
            $mail->addAddress($email);
            //finaly send emailHelp
            if($mail->Send()){
                //echo "email Sent";
                return true;
            }else{
                return false;
            }
                
    }
    
    public function updateTbl($tbl,$updateData=array(),$where) {
        $db = new Database();
        $db->update($tbl, $updateData, $where);
        $res = $db->getResult();
        if ($res) {
            echo "success";
        }
    }
}

?>