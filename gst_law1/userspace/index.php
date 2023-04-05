<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header_link.php') ?>

<style type="text/css">
    .table_wrapper{
        margin:20px;
    }
   #year_case th{
        background: #2c3e50ed;
    color: #fff;
    }
    #court th{
        background: #2c3e50ed;
    color: #fff;
    }
    .card-header{
        background: #0d9c5beb;
    
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
    <!-- [ navigation menu ] start -->
    <?php include('sidebar_nav.php') ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include('header_nav.php') ?>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- table card-1 start -->
                <div class="col-md-12 col-xl-4">

                    <!-- widget primary card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="feather icon-star-on"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php 
                           // print_r($_SESSION) 
                           // SELECT COUNT(*) as total_circular FROM `tbl_circular` WHERE dept_id = 10;
                             $db->select('tbl_gst_case_law',"COUNT(*) as total_case",null,"status =1",null,null);
                             foreach($db->getResult() as $case_count){
                                //print_r($circular_count);
                                ?>
                                <h4>Total GST Case Law</h4>
                                <h6><?php echo $case_count['total_case'] ?></h6>
                                <?php
                             }
                            ?>

                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                </div>
                <!-- table card-1 end -->
                <!-- table card-2 start -->
                <div class="col-md-12 col-xl-4">

                    <!-- widget-success-card start -->
                    <!-- <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>17</h4>
                            <h6>Achievements</h6>
                        </div>
                    </div>
                </div> -->
                    <!-- widget-success-card end -->
                </div>
                <!-- table card-2 end -->

                <!-- prject ,team member start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card table-card" style="height: 60vh; overflow-y: scroll;">

                        <div class="card-header">
                            <h5 style="color: #fff">GST Cases Year Wise</h5>

                        </div>
                        <div class="card-body p-0">
                            <div class="table_wrapper">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="year_case">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Year</th>
                                                <th>No of Cases</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $count = 0;
                                      $sql = "SELECT r.case_year,COUNT(*) as caseNo  FROM `tbl_case_ref` r LEFT JOIN `tbl_gst_case_law` l on r.case_id = l.id  WHERE l.case_status = 'Approved'  GROUP BY case_year DESC";
                                      $db->select_sql($sql);
                                      $labels = array();
                                      $data = array();

                                      foreach($db->getResult() as $row){
                                        $count++;
                                           if($row['case_year'] == ''){
                                            array_push($labels, 'NA');
                                           }else{
                                            array_push($labels, $row['case_year']);
                                           }
                                           
                                           array_push($data, $row['caseNo']);
                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo ($row['case_year'] == '')?'NA':$row['case_year']; ?></td>
                                                <td> <p style="cursor: pointer;"  onclick="datapost('view_case_year_wise.php',{year: <?php echo $row['case_year'] ?> })"><?php echo $row['caseNo']; ?></p></td>

                                            </tr>
                                            <?php
                                      }
                                    ?>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card table-card" style="height: 60vh; overflow-y: scroll;">

                        <div class="card-header">
                            <h5 style="color: #fff">GST Cases Court Wise</h5>

                        </div>
                        <div class="card-body p-0">
                        <div class="table_wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="court">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Court Name</th>
                                            <th>No of Cases</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 0;
                                            $sql = "SELECT c.court_name,COUNT(*) as court FROM `tbl_gst_case_law` g JOIN `tbl_court` c ON g.court_name = c.id  WHERE g.case_status = 'Approved' GROUP BY c.court_name";
                                            $db->select_sql($sql);
                                            $labels = array();
                                            $data = array();

                                            foreach($db->getResult() as $row){
                                                $count++;
                                                //    if($row['case_year'] == ''){
                                                //     array_push($labels, 'NA');
                                                //    }else{
                                                //     array_push($labels, $row['case_year']);
                                                //    }
                                                
                                                //    array_push($data, $row['caseNo']);
                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo ($row['court_name'] == '')?'NA':$row['court_name']; ?></td>
                                                                            <td> 
                                                                            <p style="cursor: pointer;"  onclick="datapost('view_case_court_wise.php',{court: '<?php echo $row['court_name'] ?>' })"> <?php echo $row['court']; ?></p>
                                                                                
                                                                                
                                                                            </td>

                                                                        </tr>
                                                                        <?php
                                            }
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-header">
                            <h5>Pie Charts</h5>
                        </div>
                        <div class="card-body">
                            <div id="pie-chart-1" style="width:100%"></div>
                        </div>
                    </div> -->
                </div>
                <!-- prject ,team member start -->



            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="assets/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="assets/js/pages/dashboard-main.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</body>

</html>

<script>
$('#year_case').DataTable();
$('#court').DataTable();



function datapost(path, params, method) {
    //alert(path);
    method = method || "post"; // Set method to post by default if not specified.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    for (var key in params) {
        if (params.hasOwnProperty(key)) {
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