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
        font-size: 18px;
        margin: 40px;
        text-align: center;
        color: #fff;
        display: none;
		margin-top: 6%;
        margin-left: 50%;
        padding:2%;
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
        font-size: 1.2rem;
        font-weight: 600;

    }

    .select2-search__field {
        height: 2rem;
    }
	
	
	 .autocomplete {
      position: relative;
      display: inline-block;
   }
      
   .autocomplete-items {
      position: absolute;
	  width: 96.4%;
	  background-color: #fff;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      top: 100%;
	  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
   }
   .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
	  outline: 0
   }
    .autocomplete-items div:hover {
      background-color: #e9e9e9;
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
<div class="pcoded-main-container">
<div class="pcoded-content">
<div class="row" > 
		<div class="col-lg-7" >
			<div class="alert-success shadow my-3" role="alert" style="border-radius: 0px;float:right !important" id="alert_msg">
			</div>
		</div>  
        </div>
<form id="frm_add">
<div class="row">
<div class="col-5">
<label for="" class="">Request Upto Date :</label>
<input class="form-control" type="date" name="upto_date" id="upto_date"
placeholder="Upto Date" required>
</div>
<div class="col-auto" style="margin-left:1%;padding-top:2%">
<button type="button" class="btn btn-primary mb-3" onclick="get_book_name()">Find Book Request</button>
</div>
</div>

</form>
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class=" table-striped table-hover" id="result_tbl">
                    </div> -->
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Book List</h5>
                            <div id="tbl_book_list" class="table table-responsive table-striped table-hover">
                           
                             </div>
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
//For getting book details 
function get_book_name() {
var req_upto_date = $('#upto_date').val();
get_member_request_book_list(req_upto_date);  
}
</script>