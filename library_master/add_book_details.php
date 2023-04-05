<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header_link.php') ?>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"
        integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        width: 95%;
        margin: 0 auto;
        padding: 20px;
        box-shadow: rgb(50 50 93 / 25%) 0px 2px 5px -1px, rgb(0 0 0 / 30%) 0px 1px 3px -1px;
        background-color: #f7f7f7;
        border-radius: 5px;
    }

    #circular_frm input {
        border-radius: 5px;
        /* border: none; */
    }

    #circular_frm select {
        border-radius: 5px;
        /* border: none; */
    }

    small {
        font-size: 1rem;
    }

    label {
        color: black;
        font-size: ;
        font-weight: 600;

    }

    .select2-search__field {
        height: 2rem;
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
    <?php include('sidebar_nav.php') ?>
    <!-- [ Header ] start -->
    <?php include('header_nav.php') ?>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->

    <!-- [ Main Content ] end -->
    <?php
 

     $db->select('tbl_temp_book_detail',"DISTINCT(location)",null,null,null,null);
     $res_location = $db->getResult();
     $db->select('tbl_book_type',"*",null,null,null,null);
     $res_book_type = $db->getResult(); 
     $db->select('tbl_subject_name',"*",null,null,null,null);
     $res_subject_type = $db->getResult();
 //print_r($res_location);
?>

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class=" table-striped table-hover" id="result_tbl">
                    </div> -->
                    <div class="col-md-6" style="margin-left:45%;padding-top:%">
                    <div id="alert_msg" class="alert alert-success"></div>
                    <div id="alert_msg" class="alert alert-danger"></div>
                    </div>  

                    <div class="card table-card">
                        <div class="card-header">
                        <form id="frm_add_<?=$id?>">
                                    <input type="hidden" id="update_id_<?=$id?>" value="<?=isset($id)?$id:'';?>" />
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding:1%">
                                    <div class="col-4">
                                            <label>Reference No :</label>
                                            <input class="form-control me-3" name="book_ref_no" id="book_ref_no"
                                                value="<?=isset($book_ref_no)?$book_ref_no:'';?>"
                                                placeholder="Enter Reference No." required>
                                        </div>
                                        <div class="col-4" >
                                            <label>Book Name :</label>
                                            <input class="form-control me-3" name="book_name" id="book_name"
                                                value="<?=isset($book_name)?$book_name:'';?>"
                                                placeholder="Enter Book Name" required>
                                        </div>
                                        <div class="col-4" >
                                            <label>Author's Name :</label>
                                            <input class="form-control me-3" name="author_name" id="author_name"
                                                value="<?=isset($author_name)?$author_name:'';?>"
                                                placeholder="Enter Author Name" required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding: 1%;">
                                        <div class="col-4">
                                            <label>Edition :</label>
                                            <input class="form-control me-2" name="edition" id="edition"
                                                value="<?=isset($edition)?$edition:'';?>" placeholder="Enter Edition"
                                                required>
                                        </div>
                                        <div class="col-4">
                                            <label>Year of Publication :</label>
                                            <input class="form-control me-2" name="year_of_publication"
                                                id="year_of_publication"
                                                value="<?=isset($year_of_publication)?$year_of_publication:'';?>"
                                                placeholder="Enter publication year" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Place and Publisher :</label>
                                            <input class="form-control me-2" name="place_publisher" id="place_publisher"
                                                value="<?=isset($place_publisher)?$place_publisher:'';?>"
                                                placeholder="Enter Place and Publisher" required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding: 1%;">
                                        <div class="col-4">
                                            <label>Page :</label>
                                            <input class="form-control me-2" name="page" id="page"
                                                value="<?=isset($page)?$page:'';?>" placeholder="Enter No.of Page"
                                                required>
                                        </div>
                                        <div class="col-4">
                                            <label>Price :</label>
                                            <input class="form-control me-2" name="price" id="price"
                                                value="<?=isset($price)?$price:'';?>" placeholder="Enter Price"
                                                required>
                                        </div>
                                        <div class="col-4">
                                            <label>Quantity :</label>
                                            <input class="form-control me-2" name="quantity" id="quantity"
                                                value="<?=isset($quantity)?$quantity:'';?>" placeholder="Enter Quantity"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding: 1%;">
                                        <div class="col-4">
                                            <label>Location :</label>
                                            <input class="form-control me-2" name="location" id="location"
                                                value="<?=isset($location)?$location:'';?>" placeholder="Enter Location"
                                                required>
                                        </div>
                                        <div class="col-4">
                                            <label>Row :</label>
                                            <input class="form-control me-2" name="row" id="row"
                                                value="<?=isset($row)?$row:'';?>" placeholder="Enter Row" required>
                                        </div>
                                       
                                        <div class="col-4">
                                            <label>Book Type :</label>
                                            <select class="form-control me-2" aria-label="Default select example" name ="book_category" id="book_category">
                                            <option value="">Select Book Category</option>
                                            <?php 
                                            if($res_book_type){
                                            foreach($res_book_type as $res_typ)
                                            { 
                                            $bk_typ_id=$res_typ['id']; 
                                            // if($book_category==$cat_id)
                                            // {
                                            //     $selected="selected";
                                            // }
                                            // else
                                            // {
                                            //     $selected="";
                                            // }
                                            ?>
                                            <option value="<?php echo $bk_typ_id?>"><?php echo $res_typ['book_type']?></option>
                                            <?php
                                             }
                                            } ?>              
                                            </select>
                                        </div>
                                        </div>
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding: 1%;">
                                        <div class="col-4">
                                            <label>Subject :</label>
                                            <select class="form-control me-2" aria-label="Default select example" name ="subject_name" id="subject_name">
                                            <option value="">Select subject</option>
                                            <?php 
                                            if($res_subject_type){
                                            foreach($res_subject_type as $res_sub)
                                            { 
                                            $subject_id=$res_sub['id']; ?>
                                            <option value="<?php echo $subject_id?>"><?php echo $res_sub['book_type']?></option>
                                            <?php
                                             }
                                            } ?>              
                                            </select>
                                        </div>
                                        <div class="col-4" style="padding: 26px;">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" style="padding: 10px 10px;"
                                                  data-target="#detailsModal">Add Book</button>
                                        </div>
                                    </div>
                                        </form>
                         
                            <div id="tbl_case_law" class="table table-responsive table-striped table-hover">
                              <?php //include('book_edit_details.php') ;?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div id="detailsModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width:200%;margin-left: -33%;">
                            <div class="modal-header"
                                style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, #00acc1 0%, #1abc9c 100%);;color: #fff;">
                                <h5 class="modal-title" id="m_title" style="color:#fff" style="text-align:center;"> Verify Reference ID
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="frm_add_<?=$id?>">
                                    <input type="hidden" id="update_id_<?=$id?>" value="<?=isset($id)?$id:'';?>" />
                                    <div class="row" style="margin-left:2%;margin-right:2%;padding:1%">
                                        <div class="col-8">
                                            <label>Reference No :</label>
                                            <?php 
                                            foreach($quantity as $res_qt)
                                            { ?>
                                                <input class="form-control me-3" name="book_ref_no" id="book_ref_no"
                                                value="<?=isset($book_ref_no)?$book_ref_no:'';?>"
                                                placeholder="Enter Reference No." required>
                                         <?php  }
                                            ?>
                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" id="m_footer">
                                <input type="submit" class="btn btn-primary" value="Update" id="<?=$id?>" onclick="update(this)">
                                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                            </div>
                        </div>
                    </div>
                </div>

            <div id="alert_box" class="modal fade" role="dialog" aria-labelledby="alert_boxLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alert_boxLabel2"></h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0 alrt_msg">
                            </p>
                        </div>
                        <div class="modal-footer " id="footer_alert">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>

</html>
<script src="assets/js/common.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="../js/case.js"> </script>
<script type="text/javascript">
$('#btn_search').click(function() {
    $('#circular_frm').toggle("down");


});

//For Update Book Table 

function get_location_id() {
var location_id = $('#location_id').val();
console.log(location_id);

    $.ajax({
            method: "POST",
            url: "book_edit_details.php",
            data: {'location_id': location_id},
            
            success: function(res) {
                console.log(res);
                $('#tbl_case_law').html(res);
                $('#case_law').DataTable();
                //update();

            }
        })
}
function update() {
    //alert("helo");
    var form_data = new FormData(document.getElementById('frm_add'));
    let update_id = $('#update_id').val();
    form_data.append("action", "add_master");
    form_data.append("update_id", update_id);
    form_data.append("table", "tbl_temp_book_detail");
    //alert(form_data);

    $.ajax({
        method: "POST",
        url: "ajax_case_master.php",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
            console.log(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                sessionStorage.message = "Book Details are updated successfully";
                sessionStorage.type = "success";
                location.reload();
            }

        }
    })
}


</script>