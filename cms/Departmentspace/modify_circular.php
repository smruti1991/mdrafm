<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('circular_header_link.php') ?>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <style>
    #alert_msg {
        position: absolute;
        z-index: 1400;
        top: 2%;
        /* right:4%; */
        margin: 40px;
        text-align: center;
        background: #2c8a2c;
        color: #fff;
        display: none;
    }

    #circular_frm {
        width: 70%;
        margin: 0 auto;
        padding: 20px;
        box-shadow: rgb(50 50 93 / 25%) 0px 2px 5px -1px, rgb(0 0 0 / 30%) 0px 1px 3px -1px;
        background-color: #77bfb4;
        border-radius: 5px;
    }

    #edit_circular_frm {
        width: 70%;
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

    <?php
     $db->select('tbl_department','dept_folder',null,"id=".$_SESSION['dept_id'],null,null);
     foreach( $db->getResult() as $dept){
        $dept_folder = $dept['dept_folder'];
     }
  ?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <h5>Modify Circular</h5>
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

                            <div id="circular_frm">
                                <form method="post" id="frm_circular">
                                    <div class="row" style="color: #fff;">
                                        <!-- <div class="form-group col-md-2">
                                        </div> -->
                                        <div class="form-group col-md-4 circular_no">
                                            <label></label>
                                            <input class="form-control me-2" type="search" id="circular_no"
                                                placeholder="Circular Number"><br>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label></label>
                                            <input class="form-control me-2" type="button" value="OR" />
                                        </div>
                                        <div class="form-group col-md-4 subject">
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
                                            <!-- <div class="form-group col-md-2">
                                            </div> -->

                                            <div class="form-group col-md-4 category">

                                                <select class="form-control " id="category_list" style="width: 100%;">

                                                    <option value="0">Select Category</option>
                                                    <?php
                                            $db->select('tbl_circular_group',"*",null," `dept_id` = '".$_SESSION['dept_id']."' ",null,null);
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


                                            <div class="form-group sub-category col-md-4" id="sub_category_div">

                                                <select class="form-control " id="sub_category_list"
                                                    style="width: 100%;">
                                                </select>

                                            </div>


                                        </div><br>

                                        <div class="row">
                                            <!-- <div class="form-group col-md-2">
                                            </div> -->

                                            <div class="from-group keyword col-md-4">

                                                <input type="text" class="form-control" id="date_picker"
                                                    placeholder="Date" autocomplete="off">

                                            </div>
                                            <div class="from-group keyword col-md-4">


                                                <input type="text" class="form-control" id="year" placeholder="Year">

                                            </div>
                                        </div>


                                    </div>

                                </form>
                                <div class="form-group d-flex justify-content-center mt-3">

                                    <input type="button" class="btn btn-primary" id="btn_search" value="Search"
                                        onclick="findData()" />
                                    <button type="button" class="btn btn-labeled btn-warning" id="resetFrm">
                                        Reset
                                    </button>
                                </div>
                            </div>
                            <!-- circular from edit strat here -->
                            <div id="edit_circular_frm" style="display:none">
                                <form method="post" id="edit_frm_circular">
                                    <div class="row">
                                        <!-- <div class="form-group col-md-2">
                                        </div> -->
                                        <div class="form-group col-md-4 circular_no">
                                            <label>Circular Number</label>
                                            <input class="form-control me-2" type="search" name="circular_no" id="edit_circular_no"
                                                placeholder="Circular Number" readonly>
                                              <small class="text-danger"></small>  
                                                <br>
                                        </div>

                                        <div class="form-group col-md-8 subject">
                                            <label>Subject</label>
                                            <textarea class="form-control" name="circular_subject" id="edit_subject" required>  </textarea>
                                            <small class="text-danger"></small>  

                                        </div>

                                    </div>


                                    <div class="row">
                                        <!-- <div class="form-group col-md-2">
                                            </div> -->

                                        <div class="form-group col-md-4 category">
                                            <label>Category</label>
                                            <select class="form-control " name="category" id="edit_category_list" style="width: 100%;">

                                                <option value="0">Select Category</option>
                                                <?php
                                            $db->select('tbl_circular_group',"*",null," `dept_id` = '".$_SESSION['dept_id']."' ",null,null);
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


                                        <div class="form-group sub-category col-md-4" id="sub_category_div">
                                            <label> Sub-Category</label>
                                            <select class="form-control " name="sub_category" id="edit_sub_category_list"
                                                style="width: 100%;">
                                            </select>

                                        </div>


                                    </div><br>

                                    <div class="row">
                                        <!-- <div class="form-group col-md-2">
                                            </div> -->

                                        <div class="from-group keyword col-md-4">
                                            <label> Circular Date</label>
                                            <input type="text" class="form-control" name="circular_date" id="edit_date_picker"
                                                placeholder="Date" autocomplete="off">
                                                <small class="text-danger"></small>  
                                        </div>
                                        <div class="from-group keyword col-md-4">

                                            <label> Circular Year</label>
                                            <input type="text" class="form-control" id="edit_year" placeholder="Year">
                                               <small class="text-danger"></small>  
                                        </div>
                                    </div><br>
                                    <div class="row" id="exist_file">
                                        <div class="from-group keyword col-md-4">
                                            <label> Circular File : </label>
                                            <a href="#" target="_blank" style="color:#c9100c"
                                                id="edit_circular_file"><img src="../assets/images/document_pdf.png" />

                                                circular</a>
                                            <!-- <a href="#" target="_blank" style="color:#c9100c" id="remove_file"><img
                                                    src="../images/cross.png" />

                                            </a> -->
                                            <button type="button" class="btn remove" onclick="remove(this.id)" >
                                                <img src="../assets/images/cross.png" />
                                            </button>
                                           

                                        </div>
                                    </div>
                                    <div class="row" id="new_file" style="display:none" >
                                    <div class="form-group">
                                        <label>Circular File</label>
                                        <input type="file" class="form-control" id="circular_file" name="circular_file"
                                            placeholder="Circular File" autocomplete="off">
                                        <small class="text-danger" id="file_error"></small>
                                    </div>
                                    <input type="hidden" name="dept_id" value="<?php echo $_SESSION['dept_id'] ?>" />
                                    <input type="hidden" name="update_id" id="update_id" />
                                    </div>


                                </form>
                                <div class="form-group d-flex justify-content-center mt-3">

                                    <input type="button" class="btn btn-primary" id="btn_search" value="Update"
                                        onclick="cnf_update()" />
                                    <button type="button" class="btn btn-labeled btn-warning" id="cancelFrm" onclick="cancel_frm()" >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <div class="row">

                <div class="col-md-12">
                    <!-- <div class=" table-striped table-hover" id="result_tbl">
                    </div> -->
                    <div class="card table-card">

                        <div class="card-header">
                            <h5>Search Result</h5>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class=" table-striped table-hover" id="result_tbl">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="alert_box" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="alert_boxLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alert_boxLabel"></h5>
                                
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0 alrt_msg">
                            </p>
                        </div>
                        <div class="modal-footer " id="footer">
                            
                        </div>
                    </div>
                </div>
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


// const circular_file = document.querySelector('#circular_file');

$(document).ready(function() {
    $('#dept_list').select2();
    $('#category_list').select2();
    $('#sub_category_list').select2();

    $('#edit_category_list').select2();
    $('#edit_sub_category_list').select2();


    $("#edit_date_picker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        dateFormat: 'dd-mm-yy'

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

$('#edit_category_list').on('change', function() {
    let cat_id = $('#edit_category_list').val();

    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "sub_category_list",
            cat_id: cat_id

        },
        success: function(data) {
          //  console.log(data);
            $('#edit_sub_category_list').html(data);
            // $('#sub_category_div').show();

        }
    })

})


$("#resetFrm").on('click', function() {

    $('#frm_circular')[0].reset();
    $('#category_list').val(0).trigger('change');
    $('#sub_category_list').val(0).trigger('change');

})

function findData() {
    $('#tbl_circular').html('');

    let dept_id = <?php echo $_SESSION['dept_id'] ?>;
    let circular_no = $('#circular_no').val();
    let subject = $('#subject').val();
    let date = $('#date_picker').val();
    let year = $('#year').val();

    let category_list = $('#category_list').val();
    let sub_category_list = $('#sub_category_list').val();

    if (category_list != 0) {
        var category_list_text = $('#category_list option:selected').text();
    }

    if (sub_category_list != 0) {
        var sub_category_list_text = $('#sub_category_list option:selected').text();
    }


    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "search_data",
            dept_id: dept_id,
            circular_no: circular_no,
            subject: subject,
            date: date,
            year: year,
            category_list: category_list_text,
            sub_category_list: sub_category_list_text

        },
        success: function(data) {
            // console.log(data);
            $('#result_tbl').html(data);
            //   $('#circular').DataTable({
            //       searching: false,
            //       //"bPaginate": false;
            //   });
        }
    })

}

function cancel_frm(){
    $('#edit_circular_frm').hide();
    $('#circular_frm').show();
    location.reload();
}

// $('#edit_circular_no').on('keypress', function(){
//     alert(123);
//     console.log(12345);
// })

$('input[name=circular_no]').keyup(function() { 
   // alert("Remove circular file before Update circular number");
    $('#alert_boxLabel').html("Edit Circular Number");
    $('.alrt_msg').html(" To edit Circular Number nedd to remove circula file.<br> Are you sure  want to remove this file");
    $('#footer').html(`<button type="button" class="btn  btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn  btn-danger"  >Remove
                                </button>`);
    $('#alert_box').modal('show');
    //console.log(1234) 
});

function edit(id) {
    //console.log(id);
    $('#edit_circular_frm').show();
    $('#circular_frm').hide();

    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "edit",
            edit_id: id,
            table: "tbl_circular"

        },
        dataType: "json",
        success: function(res) {
            // console.log(res);
            res.map((data) => {
                console.log(data);
                $('#edit_circular_no').val(data.circular_no);
                $('#edit_subject').val(data.subject);
                $('#edit_category_list').select2("val", data.group);
                $('#update_id').val(data.id);

                let cat_id = data.group;
                let sub_cat_id = data.sub_group;

                $.ajax({
                    type: "POST",
                    url: "ajax_circular.php",
                    data: {
                        action: "sub_category_list",
                        cat_id: cat_id,
                        sub_cat_id: sub_cat_id

                    },
                    success: function(data) {
                     
                        $('#edit_sub_category_list').html(data);
                       
                    }
                })

                $('#edit_sub_category_list').val(data.sub_group);
                var dateAr = data.date.split('-');
                var newDate = dateAr[1] + '-' + dateAr[2] + '-' + dateAr[0];
                $('#edit_date_picker').val(newDate);
                $('#edit_year').val(data.year);
              
                const dept_folder = '<?php echo $dept_folder; ?>';
                
                //cheking file exist or not
                if(data.file_name == ""){
                    $('#exist_file').hide();
                    $('#new_file').show();
                }else{
                    const path = `circulars/${dept_folder}/${data.year}/${data.file_name}`;
                    //console.log(path);
                    $('#edit_circular_file').attr('href', path);
                    $('.remove').attr('id',data.id);
                }
             
               // $('input[name=circular_no]').change(function() { console.log(1234) });
            })
            
           
        }
    })
}

function drop_alert(id){
    $('#alert_boxLabel').html("Remove Circular File");
    $('.alrt_msg').html("Are you sure  want to Drop this Circular");
    $('#footer').html(`<button type="button" class="btn  btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn  btn-danger" onclick="drop_circular(${id})" >Drop
                                </button>`);
    $('#alert_box').modal('show');
}
//drop circular to change circular number 

function drop_circular(id){
    const dept_folder = '<?php echo $dept_folder; ?>';
    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "drop_circular",
            circular_id: id,
            dept_folder:dept_folder
           

        },
        success: function(res) {
             console.log(res);
             let elm = res.split('#');
                if (elm[0] == "success") {
                    sessionStorage.message = elm[1];
                    sessionStorage.type = "success";
                    location.reload();
                    
                }
           
        }
    })
}

function remove(id){
    //alert(id);
    $('#alert_boxLabel').html("Remove Circular File");
    $('.alrt_msg').html("Are you sure  want to remove this file");
    $('#footer').html(`<button type="button" class="btn  btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn  btn-danger" onclick="remove_circular(${id})" >Remove
                                </button>`);
    $('#alert_box').modal('show');
}

function remove_circular(id){
    const dept_folder = '<?php echo $dept_folder; ?>';
    $.ajax({
        type: "POST",
        url: "ajax_circular.php",
        data: {
            action: "remove_circular",
            circular_id: id,
            dept_folder:dept_folder
           

        },
        success: function(res) {
             console.log(res);
             let elm = res.split('#');
                if (elm[0] == "success") {
                    $('#alert_box').modal('hide');
                    $('#exist_file').hide();
                    $('#new_file').show();
                    
                }
           
        }
    })
}
function cnf_update(){
    $('#alert_boxLabel').html("Update Circular");
    $('.alrt_msg').html("Are you sure  want to update this Circular");
    $('#footer').html(`<button type="button" class="btn  btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn  btn-warning" onclick="update_circular()" >Update
                                </button>`);
    $('#alert_box').modal('show');
}

function update_circular() {
    $('#alert_box').modal('hide');
      
       var  circular_no = $('#edit_circular_no').val();
       var circular_subject = $('#edit_subject').val();
       var circular_date = $('#edit_date_picker').val();
    

       document.getElementById("edit_circular_no").value=circular_no;
       document.getElementById("edit_subject").value=circular_subject;
       document.getElementById("edit_date_picker").value=circular_date;

       let circularEl = document.querySelector('#edit_circular_no');
       let  circularSubjectEl = document.querySelector('#edit_subject');
       let  date_picker = document.querySelector('#edit_date_picker');
      

    let isCircularValid = checkTextField(circularEl),
        iscircularSubjectValid = checkTextField(circularSubjectEl),
        isdateValid = checkTextField(date_picker);


    // let file_name = document.getElementById("edit_circular_file").files;
    // iscircularFileValid = chkFile(file_name);
    // console.log(iscircularFileValid)

    let isFormValid = isCircularValid &&
        iscircularSubjectValid &&
        isdateValid;

    if (isFormValid) {

        
        var file = $("#edit_circular_file").attr('href');
       
        if(file == "#"){
            var name = document.getElementById("circular_file").files[0].name;
           
            // console.log(name);
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['pdf']) == -1) {
                alert("Invalid Circular File");
            } else {

            }
        }
        
        var form_data = new FormData(document.getElementById("edit_frm_circular"));
        form_data.append("action", "update_circular");

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

                
            }
        })
    }

}
</script>