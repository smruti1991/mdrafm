<?php

//index.php

include('admin/database.php');

$object = new database();
//echo 123;
//print_r($_SESSION);
//echo ($object->is_student_login());

if ($object->is_student_login()) {
	header("location:" . $object->base_url . "student_dashboard.php");
}

include('header.php');

?>

<div class="container-fluid d-flex justify-content-between">
	<div class="side1" style="background: #eaf0fe;">
	<img src="img/online_exam2.jpg" alt="logo" style="width:70%" />
    </div>
	<div class="side2" style="width: 56vw;
    background: #eaf0fe;">
		<div class="row justify-content-md-center">
			<div class="col-sm-9">
				<span id="error"></span>
				<div class="card" style="margin-top: 10%;">
					<form method="post" class="form-horizontal" action="" id="login_form">
						<div class="card-header" style="background: #23278a;
                               color: #e5d3d3;">
							<h3 class="text-center">Login</h3>
						</div>
						<div class="card-body">

							<div class="row form-group mt-5">
								<label class="col-sm-4 col-form-label"><b>User Name</b></label>
								<div class="col-sm-8">
									<input type="text" name="username" id="student_email_id" class="form-control" required  />
								</div>
							</div>
							<div class="row form-group ">
								<label class="col-sm-4 col-form-label"><b>Password</b></label>
								<div class="col-sm-8">
									<input type="password" name="password" id="student_password" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="card-footer text-center mt-5" style="background-color: aliceblue;">
							<br />
							<input type="hidden" name="page" value="login" />
							<input type="hidden" name="action" value="check_login" />
							<p><input type="submit" name="submit" id="login_button" class="btn btn-primary" value="Login" /></p>

							<p><a href="forget_password.php">Forget Password</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <h3 class="text-center">Welcome</h3>
<p class="text-center">If you are not login into system, click <a href="login.php">here</a></p>
<div class="container">
	<div class="card mt-4 mb-4">
		<div class="card-header">Latest News</div>
		<div class="card-body">
			<?php
			$object->query = "
			      		SELECT * FROM exam_soes 
			      		WHERE exam_result_datetime != '0000-00-00 00:00:00' 
			      		ORDER BY exam_result_datetime ASC
			      		";

			$object->execute();

			if ($object->row_count() > 0) {
				$result = $object->statement_result();
				foreach ($result as $row) {
					if (time() < strtotime($row["exam_result_datetime"])) {
						echo '<p><b>' . $row["exam_title"] . ' </b>exam of <b>' . $object->Get_class_name($row["exam_class_id"]) . '</b> will publish on ' . $row["exam_result_datetime"] . '</p>';
					}
				}
			} else {
				echo '<p>No News Found</p>';
			}



			?>
		</div>
	</div>
</div> -->


<?php

include('footer.php');

?>

<script>

$(document).ready(function(){

	$('#login_form').parsley();

	$('#login_form').on('submit', function(event){
		event.preventDefault();
		if($('#login_form').parsley().isValid())
		{
			$.ajax({
				url:"ajax_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"JSON",
				beforeSend:function()
                {
                    $('#login_button').attr('disabled', 'disabled');
                    $('#login_button').val('wait...');
                },
				success:function(data)
				{
					console.log(data);
					$('#login_button').attr('disabled', false);
                    if(data.error != '')
                    {
                        $('#error').html(data.error);
                        $('#login_button').val('Login');
                    }
                    else
                    {
                        window.location.href = data.url;
                    }
				}
			});
		}
	});

});

</script>