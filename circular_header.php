<?php
session_start(); 

include ('admin/database.php') ;
$db = new Database();
?>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circular Management</title>
    <link rel="icon" href="images/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,700;1,600&family=Roboto:wght@300&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
   

    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    /> -->
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />
    <script src="admin/assets/js/core/jquery.min.js"></script>
    <!-- <script src="js/bootstrap/js/jquery.min.js"></script> -->
    <!--  <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src= "admin/assets/js/form_valid.js"> </script>

    <!-- CDN of mark.js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js"
        integrity=
"sha512-5CYOlHXGh6QpOFA/TeTylKLWfB3ftPsde7AnmhuitiTX4K5SqCLBeKro6sPS8ilsz1Q4NRx3v8Ko2IBiszzdww=="
        crossorigin="anonymous"> -->
        <style type="text/css">
        body{
            font-size: 15px;
            font-family: Montserrat, Helvetica Neue, Arial, sans-serif;
            background-color: #f8f8f8;
        }
    .wrapper {
        position: relative;
        top: 0;
        height: 100vh;
        
    }

    .sidebar {
        position: fixed;
        background: linear-gradient(135deg,rgb(52 110 118) 0%,rgb(93 153 90) 100%);
        top: 0;
        height: 100%;
        bottom: 0;
        width: 260px;
        left: 0;
        z-index: 1030;
        /* border: 1px solid black; */
    }
    .sidebar ul {
        line-height: 1.5rem;
        font-size: 1.1rem;
    }
    .sidebar li {
        margin: 10px;
    }
    .sidebar ul li:hover{
        background-color: #569985;
    }
    .sidebar ul li a{
        color: #fff;
    }
    .main-panel{
        position: relative;
        float: right;
        width: calc(100% - 260px);
        /* background-color: #e3e3e3;
        background-color: #ebecf1; */
       
        transition: all .5s cubic-bezier(.685, .0473, .346, 1);
        /* border: 1px solid black; */
    }
    .main-panel > .navbar {
  margin-bottom: 0;
}
.navbar.navbar-transparent {
  background-color: transparent !important;
  box-shadow: none;
  color: #fff;
}
.navbar.navbar-absolute {
  position: absolute;
  width: 100%;
  padding-top: 10px;
  z-index: 1029;
}
.navbar{
    padding-bottom: .625rem;
min-height: 53px;
}
.navbar .navbar-wrapper {
  display: inline-flex;
  align-items: center;
}
.navbar a:not(.btn):not(.dropdown-item) {
  color: #fff;
}
.navbar .navbar-brand {
  text-transform: uppercase;
  font-size: .8571em;
  padding-top: .5rem;
  padding-bottom: .5rem;
  line-height: 1.625rem;
}
.navbar p {
  display: inline-block;
  margin: 0;
    margin-left: 0px;
  line-height: 1.8em;
  font-size: 1em;
  font-weight: 400;
}
.navbar .navbar-nav .nav-link {
  text-transform: uppercase;
  font-size: .7142em;
  padding: .5rem .7rem;
  line-height: 1.625rem;
  margin-right: 3px;
}
.panel-header-sm {
  height: 100px;
}
.panel-header {
  
  padding-top: 80px;
  padding-bottom: 45px;
  background: #141e30;
  background: linear-gradient(90deg, #0c2646 0, #204065 60%, #2a5788);
  position: relative;
  overflow: hidden;
}
#circular_frm{
  padding: 20px;
  box-shadow: rgb(50 50 93 / 25%) 0px 2px 5px -1px, rgb(0 0 0 / 30%) 0px 1px 3px -1px;
  background-color: #77bfb4;
  border-radius: 5px;
}

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
small{
  font-size: 1rem;
}
    </style>