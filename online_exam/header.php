<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title> MDRAFM Online Student Exam Management</title>

	    <!-- Custom styles for this page -->
	    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

	    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	    <!-- Custom styles for this page -->
    	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	    <link rel="stylesheet" type="text/css" href="vendor/parsley/parsley.css"/>
	    <link rel="stylesheet" type="text/css" href="vendor/TimeCircle/TimeCircles.css"/>
	    <style>
	    	.border-top { border-top: 1px solid #e5e5e5; }
			.border-bottom { border-bottom: 1px solid #e5e5e5; }

			.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
	    </style>
	</head>
	<body>
		<?php
		if($object->is_student_login())
		{
		?>
		
		<?php
		}
		else
		{
		?>
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		 <div class="header-logo logo">
              
			  <img src="../images/logo-Copy.png" style="height:120px;margin-left: 10px;"> 
		  </div>
		  <div>
		  <h1
                                style="font-size: 1.5rem;font-family: serif;user-select: auto;font-weight:bold;color:#2551b5">
                                Madhusudan Das
                                Regional Academy of Financial Management (MDRAFM), Bhubaneswar</h1>
		  </div>
		    
	    </div>

	    <!-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	      	<h1 class="display-4">Online Student Exam Management System</h1>
	    </div> -->
	   
	    
	    <?php
		}
	    ?>
	   