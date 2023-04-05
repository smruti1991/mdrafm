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

                <div class="row">
                    <div id="search" >
                        <div class="search_div mt-2" style="margin-left: 70px;">
                            <div class="search">
                                <form method="post" id="frm_circular">
                                    <div class="row" style="color: #fff;">
                                        <div class="form-group col-md-2">
                                        </div>
                                        <div class="form-group col-md-3 circular_no">
                                            <label></label>
                                            <input class="form-control me-2" type="search" id="circular_no"
                                                placeholder="Circular Number"><br>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label></label>
                                            <input class="form-control me-2" type="button" value="OR" />
                                        </div>
                                        <div class="form-group col-md-3 subject">
                                            <label></label>
                                            <input class="form-control me-2" type="search" id="subject"
                                                placeholder="Subject / Keyword" autocomplete="off"><br>

                                        </div>
                                        <div class="col-md-2" style="padding: 1.6rem;">

                                            <a data-toggle="collapse" href="#advanceSearch" role="button"
                                                aria-expanded="false" style="color: #212e5f;text-decoration: none;"
                                                aria-controls="advanceSearch" class="advanced">
                                                Advance Search<i class="fa fa-angle-down"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="advanceSearch">


                                        <div class="row">
                                            <div class="form-group col-md-2">
                                            </div>

                                            <div class="form-group col-md-3 category">

                                                <select class="form-control " id="category_list" style="width: 100%;">

                                                    <option value="0">Select Category</option>
                                                    <?php
                                            $db->select('tbl_circular_group',"*",null," `dept_id` = '".$_POST['dept_id']."' ",null,null);
                                            // print_r( $db->getResult());
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


                                            <div class="form-group sub-category col-md-3" id="sub_category_div">

                                                <select class="form-control " id="sub_category_list"
                                                    style="width: 100%;">
                                                </select>

                                            </div>


                                        </div><br>

                                        <div class="row">
                                            <div class="form-group col-md-2">
                                            </div>

                                            <div class="from-group keyword col-md-3">

                                                <input type="text" class="form-control" id="date_picker"
                                                    placeholder="Date" autocomplete="off">

                                            </div>
                                            <div class="from-group keyword col-md-3">


                                                <input type="text" class="form-control" id="year" placeholder="Year">

                                            </div>
                                        </div>


                                    </div>

                                </form>
                            </div>
                            <div class="btnFind d-flex justify-content-end">
                                <button type="button" class="btn btn-labeled btn-primary" onclick="findData()">
                                    Find
                                </button>
                                <button type="button" class="btn btn-labeled btn-warning" id="resetFrm">
                                    Reset
                                </button>

                            </div>

                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>
</body>

</html>
<script src="js/common.js"> </script>
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