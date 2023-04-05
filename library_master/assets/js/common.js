showMessage();

function showMessage(){
	if ( sessionStorage.type=="success" ) {
        $('#alert_msg').show();
        //$('#btn_records_mtnc').show();
        //$('.toast-1').toast('show');
        $("#alert_msg").addClass("alert alert-secondary").html(sessionStorage.message);
        closeAlertBox();
       
        sessionStorage.removeItem("message");
        sessionStorage.removeItem("type");
    }
    if (sessionStorage.type == "error") {
		
        $('#alert_msg').show();
        $("#alert_msg").addClass("alert alert-danger").html(sessionStorage.message);
        closeAlertBox();
        sessionStorage.removeItem("message");
        sessionStorage.removeItem("type");
    }
}

function getBooksList(id,ref_no){
    $.ajax({
            method: "POST",
            url: "book_edit_details.php",
            data: {'location_id': id,'ref_no': ref_no},
            success: function(res) {
               // alert(res);
                $('#tbl_case_law').html(res);
                $('#case_law').DataTable();
                //update();
                //$('#detailsModal_27').modal('hide');

            }
        })
}
function get_member_book_list(subject_id,book_name){
    $.ajax({
            method: "POST",
            url: "get_member_book_list.php",
            data: {'subject_id': subject_id,'book_name': book_name},
            success: function(res) {
               // alert(res);
                $('#tbl_case_law').html(res);
                $('#case_law').DataTable();
                //update();
                //$('#detailsModal_27').modal('hide');

            }
        })
}
function verify_member_request_book_list(req_upto_date){
      $.ajax({
                  method: "POST",
                  url: "verify_book_request.php",
                  data: {'req_upto_date': req_upto_date},
                  success: function(res) {
                     //alert(res)
                      $('#tbl_book_list').html(res);
                      $('#book_table').DataTable();
                      //update();
                      //$('#detailsModal_27').modal('hide');
      
                  }
              })
  }
function get_member_request_book_list(req_upto_date){
  // alert("hello");

    $.ajax({
                method: "POST",
                url: "get_member_request_book_list.php",
                data: {'req_upto_date': req_upto_date},
                success: function(res) {
                   //alert(res)
                    $('#tbl_book_list').html(res);
                    $('#book_table').DataTable();
                    //update();
                    //$('#detailsModal_27').modal('hide');
    
                }
            })
}
function get_member_book_request_report(){
    // alert("hello");
  
      $.ajax({
                  method: "POST",
                  url: "get_member_book_request_report.php",
                  data: '',
                  success: function(res) {
                     //alert(res)
                      $('#tbl_book_list').html(res);
                      $('#book_table').DataTable();
                      //update();
                      //$('#detailsModal_27').modal('hide');
      
                  }
              })
  }
function closeAlertBox(){
window.setTimeout(function () {
$("#alert_msg").fadeOut(2000)
}, 3000);
}
