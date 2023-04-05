<?php
   //include '../admin/database.php';
   //session_start();   
  // $db = new Database(); 
  // $err = '';
	
/* 	SELECT book_ref_no, COUNT(*)
FROM `tbl_temp_book_detail`
GROUP BY book_ref_no
HAVING COUNT(*) > 1; */
	//echo count($res);
	//print_r($res);
	/* foreach($res as $row){
		$db_pass = $row['password'];
		if($row['status']==0){
            $err = "Inactive User";
            
        }
        else{
            
            }
        } 
		
	}*/




?>

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
        color: #fff;
        display: none;
		margin-top: 6%;
        margin-left: 60%;
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

<body>
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
 //print_r($res_location);
?>

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class=" table-striped table-hover" id="result_tbl">
                    </div> -->
                  
         <div class="row" > 
		<div class="col-lg-6" style="">
			<div class="alert-success shadow my-3" role="alert" style="border-radius: 0px;float:right !important" id="alert_msg">
			</div>
		</div>  
        </div>
                    <div class="card table-card">
                        <div class="card-header">
                        <form class="row g-6">
                        <div class="col-5">
                        <label for="" class="">Location</label>
                        <select class="form-control me-2" aria-label="Default select example" id="location_id">
                        <option value="">Select Location</option>
                            <?php 
                        if($res_location){
                            foreach($res_location as $res_loc)
                            { 
                            $location=$res_loc['location']; ?>
                        <option value="<?php echo $location?>"><?php echo $location?></option>
                  <?php  }
                        } ?>
                         </select>
                        </div>
                        <div class="col-5">
                        <label for="" class="">Reference No.</label>
                        <input class="form-control me-3" name="book_ref_no" id="book_ref_no"
                                                value=""
                                                placeholder="Enter Reference No." required>
                        </div>
                        <div class="col-auto" style="margin-left:%;padding-top:2%">
                        <button type="button" class="btn btn-primary mb-3" onclick="get_location_id()">Show</button>
                        </div>
                        </form> 
                         
                            <div id="tbl_case_law" class="table table-responsive table-striped table-hover">
                              <?php //include('book_edit_details.php') ;?>
                            </div>
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
</html>
<script src="assets/js/common.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="../js/case.js"> </script>
<script type="text/javascript">
$( document ).ready(function() {
    var location_id = $('#location_id option:selected').text();
	//alert(location_id);
});

//For Update Book Table 

 function get_location_id() {
var location_id = $('#location_id').val();
var book_ref_no = $('#book_ref_no').val();
  // console.log(location_id);
    getBooksList(location_id,book_ref_no);
   
}

function update(data) {
        //alert("helo");
	 var updt_id=data.id;
    var form_data = new FormData(document.getElementById('frm_add_'+updt_id));
   
    let update_id = $("#update_id_"+updt_id).val();
    form_data.append("action", "add_master");
    form_data.append("update_id", update_id);
    form_data.append("table", "tbl_temp_book_detail");
    //alert('#detailsModal_'+updt_id);
    
    $.ajax({
        method: "POST",
        url: "ajax_case_master.php",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
           //alert(res);
            let elm = res.split('#');
            if (elm[0] == "success") {
                var location_id = $('#location_id').val();
                var book_ref_no = $('#book_ref_no').val();
                $('#detailsModal_'+updt_id).modal('hide');
                getBooksList(location_id,book_ref_no);
                $('.modal-backdrop').remove();
                sessionStorage.message = "Book Details are updated successfully";
                sessionStorage.type = "success";
                showMessage();
                //location.reload();
         
            }

        }
    })
}
</script>