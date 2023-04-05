<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
       include('circular_header.php'); 
    ?>

</head>

<body>
    <div class="wrapper">
        <?php include('circular_sidebar.php'); ?>

        <div class="main-panel">
            <?php include('circular_navbar.php'); ?>

            <div class="content" style="margin-top: 50px;">

                <div class="" >
                    <div class="col-md-4">
                    <div id="alert_msg" class="alert alert-success">added successfully</div>
                    </div>
                    <div class="col-md-4" style="margin: 0 auto;">
                        <div id="circular_frm">
                            <form id="frm_add">
                                <div class="form-group ">
                                    <label>Circular Number</label>
                                    <input class="form-control me-2" type="search" name="circular_no" id="circular_no"
                                        placeholder="Circular Number" required>
                                    <small class="text-danger" id="circularNo_err" ></small>
                                    
                                </div>
                                <div class="form-group ">
                                    <label>Circular Subject</label>
                                    <!-- <input class="form-control me-2" type="search" id="circular_sub"
                                    placeholder="Circular Subject"><br> -->
                                    <textarea class="form-control" name="circular_subject" id="circular_subject" placeholder="Circular Subject"></textarea>
                                    <small class="text-danger"></small>
                                    
                                </div>
                                <div class="from-group">

                                    <input type="text" class="form-control" id="date_picker" name="date"  placeholder="Circular Date"
                                        autocomplete="off">
                                    <small class="text-danger"></small>
                                </div><br>
                                <div class="form-group category">
                                     <label>Circular Category</label>
                                    <select class="form-control " name="category" id="category_list" style="width: 100%;">

                                        <option value="0">Select Category</option>
                                        <?php
                                      // print_r($_SESSION);
                                            $db->select('tbl_circular_group',"*",null," `dept_id` = '".$_SESSION['dept_id']."' ",null,null);
                                           //  print_r( $db->getResult());
                                            foreach($db->getResult() as $Category){
                                                ?>
                                        <option value="<?php echo $Category['id'] ?>">
                                            <?php echo $Category['group_name'] ?>
                                        </option>
                                        <?php
                                            }

                                        ?>

                                    </select>

                                </div><br>
                                <div class="form-group sub-category"  id="sub_category_div">
                                   <label>Circular  Sub-Category</label>
                                    <select class="form-control" name="sub_category" id="sub_category_list" style="width: 100%;">
                                    </select>

                                </div><br>
                                <div class="form-group">
                                   <label>Circular File</label>
                                   <input type="file" class="form-control" id="circular_file" name="circular_file"  placeholder="Circular File"
                                        autocomplete="off">
                                    <small class="text-danger" id="file_error" ></small>
                                </div>
                                <input type="hidden" name="dept_id" value="<?php echo $_SESSION['dept_id'] ?>" />
                                </from>
                                <div class="form-group d-flex justify-content-center mt-3">

                                   <input type="button" class="btn btn-primary" value="Submit " onclick="add_circular()" />
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>




            </div>

        </div>
    </div>
</body>

</html>
<script src= "js/common.js"> </script>
<script type="text/javascript">
     const circularEl = document.querySelector('#circular_no');
     const circularSubjectEl = document.querySelector('#circular_subject');
     const date_picker = document.querySelector('#date_picker');
    // const circular_file = document.querySelector('#circular_file');

$(document).ready(function() {
    $('#dept_list').select2();
    $('#category_list').select2();

    $('#sub_category_list').select2();


    $("#date_picker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0"
    });
});


$('#category_list').on('change', function() {
    let cat_id = $('#category_list').val();

    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "sub_category_list",
            cat_id: cat_id

        },
        success: function(data) {
            // console.log(data);
            $('#sub_category_list').html(data);
            // $('#sub_category_div').show();

        }
    })

})

function add_circular(){
    let  isCircularValid =  checkTextField(circularEl),
         iscircularSubjectValid = checkTextField(circularSubjectEl),
         isdateValid = checkTextField(date_picker);
        

         let file_name = document.getElementById("circular_file").files;
         iscircularFileValid = chkFile(file_name);
         console.log(iscircularFileValid)

        // if( document.getElementById("circular_file").files.length == 0 ){
        //     console.log("no files selected");
        // }
         
         let isFormValid = isCircularValid &&
                           iscircularSubjectValid &&
                           isdateValid && iscircularFileValid;
        
        if(isFormValid){

            var name = document.getElementById("circular_file").files[0].name;

            var form_data = new FormData(document.querySelector('form') );
           // console.log(name);
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['pdf']) == -1) {
                alert("Invalid Circular File");
            }else{

            }
           
            form_data.append("action", "add_circular");

           // console.log(name);
                $.ajax({
                method: "POST",
                url: "ajax_circular.php",
                data:form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    console.log(res);
                    let elm = res.split('#');
                    if (elm[0] == "success") {
                        sessionStorage.message =  elm[1];
                        sessionStorage.type = "success";
                        location.reload();
                    }

                    if(elm[0] == "dup"){
                      $('#circularNo_err').html('Circular Number Already Present');
                    }
                }
            })
        }
                       
}
</script>