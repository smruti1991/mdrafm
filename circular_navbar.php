 <!-- Navbar -->

 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">

<div class="container-fluid">
    <div class="navbar-wrapper">

        <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>

        <!-- <a class="navbar-brand" href="#pablo">MENU</a> -->

        <p style="margin-left: 95px;font-size: 17px;">Circular Management System</p>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>

    </div>



    <div class="collapse navbar-collapse justify-content-end" id="navigation">

        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                <span>
                <?php 
                //print_r($_SESSION);
                echo $_SESSION['name'];
                ?>
                
                </span>
                </a>
            
            
            </li> -->
                            <!-- <li class="nav-item">
                <a class="nav-link" href="change_password.php">
                change Password
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="circular_management.php">
                    Logout
                </a>


            </li>

        </ul>


    </div>
</div>
</nav>
<!-- End Navbar -->
<div class="panel-header panel-header-sm"> </div>