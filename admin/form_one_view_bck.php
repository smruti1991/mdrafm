<!DOCTYPE html>
<html lang="en">

<head>

    <?php

        include('header_link.php');
        include('form1_header_link.php');
       // include('../config.php');
        include 'database.php';
        $db = new Database();
      
    
   
        ?>
</head>

<body class="user-profile">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->





    <div class="wrapper ">

        <?php include('sidebar.php'); ?>

        <div class="main-panel" id="main-panel">
            <?php include('navbar.php'); ?>

            <div class="panel-header panel-header-sm">


            </div>


            <div class="content">

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Form-I</h5>
                            </div>
                            <?php
                    $id = $_SESSION['user_id'];
                  
                    $db->select('tbl_trainee_info','*',null,'user_id='.$user_id,null,null);
                    $res2 = $db->getResult();
                    if($res2){

                       
                            foreach($res2 as $res){
                           // print_r($res);
                ?>
                            <div class="card-body">
                                <form>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Name of the Training</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder=" <?php echo $res['training_name'];?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Period of training</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['period_of_training'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Name of the Trainee</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['first_name'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> &nbsp;</label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['last_name'];?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Father's Name</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['father_name'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Mother's Name</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['mother_name'];?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong> Blood Group</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['blood_group'];?>">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Date of Birth</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo date("d-m-Y",strtotime($res['d_o_b']));?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Educational Qualifications</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['qualification'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Marital Status</strong></label>
                                                <input type="text" disabled class="form-control date-withicon"
                                                    placeholder="<?php echo $res['marital_status'];?>" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="padding-left: 43%;"><strong>Contact
                                                        Details</strong></label></br>
                                                <label><strong>Parmanent Address</strong></label>
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['parmanent_addr'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <!-- <label><strong>State</strong></label> -->

                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['state_id'];?>">

                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <!-- <label><strong>District</strong></label> -->
                                                <input type="text" disabled class="form-control"
                                                    placeholder="<?php echo $res['district_id'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <!-- <label><strong>Pin Code</strong></label> -->
                                                <input type="number" disabled class="form-control"
                                                    placeholder="<?php echo $res['pr_pin'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Present Address</strong></label>

                                                <input type="text" disabled class="form-control addr"
                                                    placeholder="<?php echo $res['present_addr'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <!-- <label><strong>State</strong></label> -->
                                                <input type="text" disabled class="form-control addr"
                                                    placeholder="<?php echo $res['p_state'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <!-- <label><strong>District</strong></label> -->
                                                <input type="text" disabled class="form-control addr"
                                                    placeholder="<?php echo $res['p_dist'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <!-- <label><strong>Pin Code</strong></label> -->
                                                <input type="number" disabled class="form-control addr"
                                                    placeholder="<?php echo $res['p_pin'];?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Mobile Number</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['mobile'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Email</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['email'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="padding-left: 43%;"><strong>Bank Details</strong></label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Bank Name</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['bank_id'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Account No.</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['account_num'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>IFSC Code</strong></label>
                                                <input type="text" disabled class="form-control" name="t_name"
                                                    placeholder="<?php echo $res['ifsc_code'];?>">
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="padding-left: 43%;"><strong>Health & Medical
                                                        History(indicate if)</strong></label>

                                            </div>
                                        </div>
                                        <div class="form-check">

                                            <?php

$db->select('tbl_medical_info','*',null,'user_id='.$user_id,null,null);
$sql3 = $db->getResult();

if($sql3)
{
   
    foreach( $sql3 as $res1 ) {
         $medical = explode(',', $res1['reason']);

          foreach($medical as $reason){
       
            $db->select('tbl_medical_history','*',null,'id='.$reason,null,null);
            foreach($db->getResult() as $res2 ) {
?>

                                            <input type="text" disabled class="form-control" name="t_name"
                                                placeholder="<?php  echo isset($res2['medical_history'])?$res2['medical_history']:'NO'; ?>" />

                                            </label></br>
                                            <?php    }

}

 ?>

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <label for="photo" style="margin-left: 20px;"><strong>Any other
                                                            category/symptom as notified</strong></label>
                                                    <input type="text" disabled class="form-control" name="t_name"
                                                        placeholder="<?php  echo $res1['other']; ?>">

                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="photo" style="margin-left: 20px;"><strong>Whether Differently
                                                    Abled?</strong></label>
                                            <input type="text" disabled class="form-control" name="t_name"
                                                placeholder="<?php  echo $res1['diff_abled']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="photo" style="margin-left: 20px;"><strong>Past Service
                                                    experience(If any)</strong></label>
                                            <input style="margin-right: 50%;" type="text" class="form-control"
                                                name="t_name" placeholder="<?php  echo $res1['past_service']; ?>">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="photo" style="margin-left: 20px;"><strong>Hostel
                                                    Accommodation</strong></label>
                                            <input style="margin-right: 50%;" type="text" class="form-control"
                                                name="t_name" placeholder="<?php  echo $res1['hostel_acc']; ?>">

                                        </div>
                                    </div>
                                    <?php }

}
                    ?>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <label style="padding-left: 43%;"><strong>Upload Dcoumnets</strong></label>
                                        </div>
                                        <?php 

$db->select('tbl_traniee_documents','*',null,'user_id='.$id,null,null);
$res8 = $db->getResult();

if($res8)
{
   

    foreach( $res8 as $res5 ) {
       // print_r($res5);
        ?>
        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>Passport
                    size Photo : </strong>
            </label>
            <?php 
               if($res5['photo']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="photo" id="photo" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('photo',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['photo'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'photo','<?php echo $res5['photo'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
               
                   

        </div>
        <div class="col-md-6">


            <label class="form-check-label" style="padding-top: 20%;"><strong>Joining
                    report in OGFR II Form</strong></label>
          

                <?php 
               if($res5['joining_report']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="joining_report" id="joining_report" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('joining_report',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['joining_report'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'joining_report','<?php echo $res5['joining_report'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>Character
                    Certificate I & II</strong></label>

            <!-- <a href="uploads/<?php echo $res5['character_certificate'];?>"
                target="_blank"
                class="form-control"><?php echo $res5['character_certificate'];?></a> -->
            
                <?php 
               if($res5['character_certificate']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="character_certificate" id="character_certificate" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('character_certificate',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['character_certificate'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'character_certificate','<?php echo $res5['character_certificate'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>
        <div class="col-md-6">

         <label class="form-check-label" style="padding-top: 20%;"><strong>HSC
                Certificate</strong></label>
        <!--<a href="uploads/<?php echo $res5['hsc_certificate'];?>" target="_blank"
            class="form-control"><?php echo $res5['hsc_certificate'];?></a> -->
        
            <?php 
               if($res5['hsc_certificate']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="hsc_certificate" id="hsc_certificate" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('hsc_certificate',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['hsc_certificate'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'hsc_certificate','<?php echo $res5['hsc_certificate'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>


        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>Id Proof</strong></label>
            <!-- <a href="uploads/<?php echo $res5['idproof_type'];?>" target="_blank"
                class="form-control"><?php echo $res5['idproof_type'];?></a> -->
                <select class="custom-select mr-sm-2" style="border-radius: 30px;"
                    id="id_type" onchange="update_IdProof(<?php echo $res5['id'] ?>)" >
                    <option value="">Select ID Proof Type</option>
                    <option value="Adhar Card" <?php echo ($res5['idproof_type'] == "Adhar Card") ? "selected" :"" ?> >Adhar Card</option>

                    <option value="PAN Card" <?php echo ($res5['idproof_type'] == "PAN Card") ? "selected" :"" ?>>Pan Card</option>
                    <option value="Voter ID" <?php echo ($res5['idproof_type'] == "Voter ID") ? "selected" :"" ?>>Voter Id</option>


                </select>
        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>Adhar
                    Card/VoterID/Pan Card</strong></label>
            <!-- <a href="uploads/<?php echo $res5['PAN_card'];?>" target="_blank"
                class="form-control"><?php echo $res5['PAN_card'];?></a> -->
                <?php 
               if($res5['PAN_card']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="PAN_card" id="PAN_card" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('PAN_card',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['PAN_card'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'PAN_card','<?php echo $res5['PAN_card'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

       

        <div class="col-md-6">

            <label class="form-check-label"
                style="padding-top: 20%;"><strong>Non-employment
                    Certificate</strong></label>
            <!-- <a href="uploads/<?php echo $res5['non_employment'];?>" target="_blank"
                class="form-control"><?php echo $res5['non_employment'];?></a> -->

                <?php 
               if($res5['non_employment']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="non_employment" id="non_employment" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('non_employment',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['non_employment'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'non_employment','<?php echo $res5['non_employment'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

        <div class="col-md-6">

            <label class="form-check-label"
                style="padding-top: 20%;"><strong>Undertaking/Declaration</strong></label>
            <!-- <a href="uploads/<?php echo $res5['undertaking_declaration'];?>"
                target="_blank"
                class="form-control"><?php echo $res5['undertaking_declaration'];?></a> -->

                <?php 
               if($res5['undertaking_declaration']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="undertaking_declaration" id="undertaking_declaration" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('undertaking_declaration',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['undertaking_declaration'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'undertaking_declaration','<?php echo $res5['undertaking_declaration'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>First page
                    of Bank Passbook/Cancelled Bank Cheque Leaf</strong></label>
            <!-- <a href="uploads/<?php echo $res5['bank_passbook'];?>" target="_blank"
                class="form-control"><?php echo $res5['bank_passbook'];?></a> -->
                <?php 
               if($res5['bank_passbook']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="bank_passbook" id="bank_passbook" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('bank_passbook',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['bank_passbook'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'bank_passbook','<?php echo $res5['bank_passbook'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>PRAN
                    Card</strong></label>
            <!-- <a href="uploads/<?php echo $res5['PRAN_Card'];?>" target="_blank"
                class="form-control"><?php echo $res5['PRAN_Card'];?></a> -->
                <?php 
               if($res5['PRAN_Card']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="PRAN_Card" id="PRAN_Card" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('PRAN_Card',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['PRAN_Card'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'PRAN_Card','<?php echo $res5['PRAN_Card'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>

        <div class="col-md-6">

            <label class="form-check-label" style="padding-top: 20%;"><strong>NPS
                    Registration form</strong></label>
            <!-- <a href="uploads/<?php echo $res5['NPS_registration'];?>" target="_blank"
                class="form-control"><?php echo $res5['NPS_registration'];?></a> -->
                <?php 
               if($res5['NPS_registration']== ''){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="NPS_registration" id="NPS_registration" class="form-control"
                            style="opacity: 1;position: unset;height: 85%;border-radius: 5px;">
                    </div>
                    <div class="col-md-6" id="upload_btn">
                    <input type="button" class="btn btn-info btn_sm" id="latter_btn1"
                            onclick="upload_doc('NPS_registration',<?php echo $res5['id'] ?>)" value="Upload">
                    </div>
                </div>

                <?php
               } else{
                ?>
                   <a class="mr-2" href="uploads/<?php echo $res5['NPS_registration'];?>" target="_blank">view <img
                                      src="../images/document_pdf.png" /></a>
                <a class="mr-2" href="#" class="remove" id="<?php echo $res5['id'] ?>" onclick="remove(this.id, 'NPS_registration','<?php echo $res5['NPS_registration'] ?>')"> <img
                    src="../images/cross.png" /></a>

                <?php
               }
            
            ?>
        </div>


    </div>

                                    <?php 
}
}?>

                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-6">
                                            <?php
                                              if($res['status'] == 0  ){
                                                  ?>
                                                    <input type="button" class="btn btn-primary" name="submitToMdrafm"
                                                value="Submit To MDRAFM"
                                                onclick="submitmdrafm(<?php echo $res['user_id'] ?>)" />
                                                  <?php
                                              }else{
                                                ?>
                                                <input type="button" class="btn btn-success" name="submitToMdrafm"
                                                value="Submitted Successfully" />
                                            
                                              <?php
                                              }
                                            
                                            ?>
                                           

                                        </div>
                                    </div>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
            <?php }
}?>

        </div>

    </div>

    </div>

    </div>

    <!-- msgBox Modal Modal HTML -->
    <div id="cnfModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="m_title" style="text-align:center;">Send To ndrafm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="warning">
                            <p>Are you sure you want to Submit To MDRAFM?</p>
                            <!-- <p class="text-warning"><small>This action cannot be undone.</small></p> -->
                        </div>
                        <p id="m_body"></p>
                    </div>
                    <div class="modal-footer" id="m_footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                    </div>
                </form>
            </div>
        </div>
    </div>

   
    <?php include('common_script.php') ?>
    <script type="text/javascript">

function upload_doc(fname,update_id) {
   // alert(fname);
    var id1 = fname;
    var name = document.getElementById(id1).files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'pdf']) == -1) {
        alert("Invalid Image File");
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(id1).files[0]);
    var f = document.getElementById(id1).files[0];
    var fsize = f.size || f.fileSize;

    

        form_data.append("file", document.getElementById(id1).files[0]);
        form_data.append("field", id1);
        form_data.append("action", "update_doc");
        form_data.append("update_id", update_id);

        $.ajax({
            url: "ajax_doc_upload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
            },
            success: function(data) {
                console.log(data);
                alert('Upload Successfully');
                location.reload();
            }
        });
       
    }

function update_IdProof(update_id){
    let id_type = $('#id_type').val();
    alert(id_type);
    $.ajax({
            url: "ajax_doc_upload.php",
            method: "POST",
            data: {'action':'update_id_proof','id_type':id_type,'update_id':update_id},
            
            success: function(data) {
                console.log(data);
                alert('Upload Successfully');
                //location.reload();
            }
        });
}


function remove(id,field_name,doc){
    //alert(doc_name);
    if(confirm("Are you sure you want to delete this?")){
        $.ajax({
        type:'POST',
        url:'ajax_doc_upload.php',
        data:{action:"remove_trainee_doc",id:id,field_name:field_name,doc:doc},
        success: function(res){
            console.log(res);
            let elm = res.split('#');
            //console.log(elm[0]);
            if (elm[0] == "success") {
                //print_r$("#email_div").load(" #email_div");
                location.reload();
            }
        }
    })
    }
    
}
    function submitmdrafm(id) {

        //alert(id)

        cnfBox(id)
        //window.location.href="dashboard1.php";

    }

    function cnfBox(id) {
        //alert(id);
        $('#m_footer').empty();
        var html =
            `<input type="button" class="btn btn-danger btn-dlt" value="Submit" onclick="sendToMdrafm(${id},'tbl_trainee_info')" />`;
        $('#m_footer').append(html);
        $('#cnfModal').modal('show');
    }

    function sendToMdrafm(id,tbl){

        $.ajax({
        type: "POST",
        url: "ajax_trainee.php",
        data: {

            action: "send_mdrafm",
            id: id,
            table: tbl
        },
        success: function(res) {
            console.log(res);
            if (res == "success") {
                sessionStorage.message = "Send to MDRAFM Successfully";
                sessionStorage.type = "success";
                location.reload();
            }
        }
    })
    }
    </script>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>


    <script src="assets/js/core/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../css/bootstrap-datepicker3.css" />
    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
    <script>
    $(function() {
        $('.date-withicon').datepicker({
            format: 'mm-dd-yyyy'
        });
    });
    </script>



    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="../../../buttons.github.io/buttons.js"></script>


    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>





    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/now-ui-dashboard.minaa26.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>


    <!-- Sharrre libray -->
    <script src="assets/demo/jquery.sharrre.js"></script>



</body>

</html>