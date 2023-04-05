<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('circular_header_link.php') ?>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <style>
        #alert_msg{
    position:absolute;
    z-index:1400;
    top:2%;
    /* right:4%; */
    margin:40px;
    text-align:center;
    background: #2c8a2c;
    color: #fff;
    display:none;
}
    #circular_frm {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        box-shadow: rgb(50 50 93 / 25%) 0px 2px 5px -1px, rgb(0 0 0 / 30%) 0px 1px 3px -1px;
        background-color: #77bfb4;
        border-radius: 5px;
    }

    small {
        font-size: 1rem;
    }
    </style>
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <?php include('sidebar_nav_circular.php') ?>
    <!-- [ Header ] start -->
    <?php include('header_nav_circular.php') ?>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <h5>Add New Circular</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i
                                                        class="feather icon-maximize"></i> maximize</span><span
                                                    style="display:none"><i class="feather icon-minimize"></i>
                                                    Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                        class="feather icon-minus"></i> collapse</span><span
                                                    style="display:none"><i class="feather icon-plus"></i>
                                                    expand</span></a></li>
                                        <!-- <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-4">
                              <div id="alert_msg" class="alert alert-success">added successfully</div>
                            </div>
                       
                            <!-- <div class="toast hide toast-1" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header" style="background-color: rgb(29 162 44 / 85%);color: #fff;">
                                    
                                    <strong class="mr-auto " >Success</strong>
                                   
                                    <button type="button" class="m-l-5 mb-1 mt-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                   Circular Added Successfully
                                </div>
                            </div> -->
                            <div id="circular_frm">
                                <form id="frm_add">
                                    <div class="form-group ">
                                        <label>Circular Number</label>
                                        <input class="form-control me-2" type="search" name="circular_no"
                                            id="circular_no" placeholder="Circular Number" required>
                                        <small class="text-danger" id="circularNo_err"></small>

                                    </div>
                                    <div class="form-group ">
                                        <label>Circular Subject</label>
                                        <!-- <input class="form-control me-2" type="search" id="circular_sub"
                                    placeholder="Circular Subject"><br> -->
                                        <textarea class="form-control" name="circular_subject" id="circular_subject"
                                            placeholder="Circular Subject"></textarea>
                                        <small class="text-danger"></small>

                                    </div>
                                    <div class="from-group">

                                        <input type="text" class="form-control" id="date_picker" name="date"
                                            placeholder="Circular Date" autocomplete="off">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="form-group category">
                                        <label>Circular Category</label>
                                        <select class="form-control " name="category" id="category_list"
                                            style="width: 100%;">

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

                                    </div>
                                    <div class="form-group sub-category" id="sub_category_div">
                                        <label>Circular Sub-Category</label>
                                        <select class="form-control" name="sub_category" id="sub_category_list"
                                            style="width: 100%;">
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Circular File</label>
                                        <input type="file" class="form-control" id="circular_file" name="circular_file"
                                            placeholder="Circular File" autocomplete="off">
                                        <small class="text-danger" id="file_error"></small>
                                    </div>
                                    <input type="hidden" name="dept_id" value="<?php echo $_SESSION['dept_id'] ?>" />
                                    </from>
                                    <div class="form-group d-flex justify-content-center mt-3">

                                        <input type="button" class="btn btn-primary" value="Submit "
                                            onclick="add_circular()" />
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>

</html>
<script src="../assets/js/common.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
            console.log(data);
            $('#sub_category_list').html(data);
            // $('#sub_category_div').show();

        }
    })

})

function add_circular() {
    let isCircularValid = checkTextField(circularEl),
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

    if (isFormValid) {

        var name = document.getElementById("circular_file").files[0].name;

        var form_data = new FormData(document.querySelector('form'));
        // console.log(name);
        var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['pdf']) == -1) {
            alert("Invalid Circular File");
        } else {

        }

        form_data.append("action", "add_circular");

        // console.log(name);
        $.ajax({
            method: "POST",
            url: "ajax_circular.php",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                console.log(res);
                let elm = res.split('#');
                if (elm[0] == "success") {
                    sessionStorage.message = elm[1];
                    sessionStorage.type = "success";
                    location.reload();
                }

                if (elm[0] == "dup") {
                    $('#circularNo_err').html('Circular Number Already Present');
                }
            }
        })
    }

}
</script>