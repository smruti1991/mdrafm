<?php

include('database.php');

$object = new database();

if(!$object->is_login())
{
    header("location:".$object->base_url."admin");
}

include('header.php');
                
?>
<span id="error"></span>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Exam Management</h1>

<!-- DataTales Example -->
<span id="message"></span>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold text-primary">Exam List</h6>
            </div>
           
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="exam_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Paper</th>
                        <th>Exam Date & Time</th>
                        <th>Exam Duration</th>
                        <th>Total Questions</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table> 
        </div>
    </div>
</div>

<div id="traineeAttendanceModal" class="modal fade">
  	<div class="modal-dialog modal-lg">
    	<form method="post" id="traineeAttendance_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Take Trainee Attendance</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Exam Secret Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="secret_code" id="secret_code" autocomplete="off" class="form-control" required />
                        </div>
                    </div>
                   
        		</div>
        		<div class="modal-footer">
          			
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<?php
                include('footer.php');
                ?>



<script>

$(document).ready(function() {
    
    var dataTable = $('#exam_table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "bDestroy": true,
            "serverMethod":'post',
            "order" : [],
            "ajax" : {
                url:"examiner_exam_shedule_list_action.php",
                type:"POST",
                data:{action:'fetch'}
            },
            "column":[
                {
                    "targets":[3, 4, 5, 6, 7, 8],
                    "orderable":false,
                },
            ],
        });

});

function start_exam(exam_id){

   
   $('.modal-footer').html('');

   $('.modal-footer').html(` <input type="button" class="btn btn-success" value="Submit" onclick="verify_exam_code(${exam_id})" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>`);
   $('#traineeAttendanceModal').modal('show');

  
}

function view_result(exam_id){
    datapost('view_exam_result.php',{exam_id:exam_id});
}


function verify_exam_code(exam_id){
    let user_id = <?php echo $_SESSION['user_id'] ?>;
    let secret_code = $('#secret_code').val();
    $.ajax({
       url:"examiner_exam_shedule_list_action.php",
       method:"POST",
       data:{"action":'start_exam',exam_id:exam_id,user_id:user_id,secret_code:secret_code},
       dataType:"JSON",
        success:function(data)
        {
            console.log(data);
            $('#traineeAttendanceModal').modal('hide');
            if(data.error != '')
                    {
                        $('#error').html(data.error);
                       
                    }
                    else
                    {
                        window.location.href = data.url;
                       // window.location.href = "start_online_exam.php";
                    }
           // $('#set_qstn').attr('disabled', false);

        }
   })
}


function datapost(path, params, method) {
			//alert(path);
			method = method || "post"; // Set method to post by default if not specified.
			var form = document.createElement("form");
			form.setAttribute("method", method);
			form.setAttribute("action", path);
			for(var key in params) {
				if(params.hasOwnProperty(key)) {
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", key);
					hiddenField.setAttribute("value", params[key]);
					form.appendChild(hiddenField);
				 }
			}
			document.body.appendChild(form);
			form.submit();
		}



</script>