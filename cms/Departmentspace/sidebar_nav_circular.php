<!-- [ navigation menu ] start -->
<?php
session_start(); 

include ('../database.php') ;
$db = new Database();
?>
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header" style="background: #f6f6f6;">
						<img class="img-radius" style="width: 70px;" src="Seal_of_Odisha.png" alt="User-Profile-Image">
						<div class="user-details">
							<span 
                             style="color: #342897;
                                    font-size: 1.2rem;
                                    font-weight: 600;
                                    text-transform: uppercase;" 
                            ><?php echo $_SESSION['name'] ?></span>
							
						</div>
					</div>
					
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<!-- <label>Navigation</label> -->
					</li>
					<li class="nav-item">
					    <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					
					<li class="nav-item pcoded-menu-caption">
						<!-- <label>Pages</label> -->
					</li>
					
					<li class="nav-item"><a href="add_circular.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Add Circular</span></a></li>
					<li class="nav-item"><a href="modify_circular.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Modify Circular</span></a></li>

				</ul>
				
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->