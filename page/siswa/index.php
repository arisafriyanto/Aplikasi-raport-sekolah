<?php 

    session_start();

    require "../../functions.php";
    

    if(!isset($_SESSION['login'])) {
        header("location: ../../login.php");
    }


?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Aplikasi Raport</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-dark fixed-top">
                <h2 style="color: white; padding-left: 35px; padding-top: 15px;">Aplikasi Raport</h2>


            <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon rounded bg-light"></span>
            </button>


                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item"></li>



                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="index.php" class="connection-item">
                                                <i class="fas fa-home"></i>
                                                <span>Home</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=detail" class="connection-item">
                                                <i class="fas fa-print"></i>
                                                <span>Cetak</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a target="_blank" href="https://m.facebook.com/smkbismakersana/?tsid=0.7431975727422291&source=result" class="connection-item">
                                                <i class="fab fa-facebook-f"></i>
                                                <span>Facebook</span>
                                            </a>
                                        </div>
                                    </div>


                                    
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a target="_blank" href="https://www.instagram.com/smkbismakersana/" class="connection-item">
                                                <i class="fab fa-instagram"></i>
                                                <span>Instagram</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a target="_blank" href="https://www.youtube.com/channel/UC6rBfn1n5MAuI2wokZzHRIw/featured" class="connection-item">
                                                <i class="fab fa-youtube"></i>
                                                <span>Youtube</span>
                                            </a>
                                        </div>
                                    </div>



                                </li>
                            </ul>
                        </li>
                                                
                        <?php 

                            $id_siswa = $_SESSION['id_siswa']; 

                            $result = mysqli_query($conn, "select * from siswa where id_siswa='$id_siswa' ");

                            $data = mysqli_fetch_assoc($result);


                        ?>
						
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="../../assets/img/siswa/<?=$data['foto_siswa']?>" alt="" class="user-avatar-md rounded-circle">
							</a>

                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo ucwords($_SESSION['username']); ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="?page=profile&action=account"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="../../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
		</div>
		
		
        <div class="nav-left-sidebar sidebar-white">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">
                                    <i class="fas fa-home"></i>Dashboard
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="?page=detail">
                                    <i class="fas fa-edit"></i>Nilai
                                </a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
	</div>




		<?php 

			@$page = $_GET['page'];
			@$action = $_GET['action'];

			if($page == "") {
				include "home.php";
			}else if($page == "profile") {
                if($action == "account") {
                    include "profile/account.php";
                }
            }else if($page == "detail") {
                if($action == "") {
                    include "laporan/detail/detail.php";
                }
            }

		?>


                            
<script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="../../assets/libs/js/main-js.js"></script>
<script src="../../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<script src="../../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<script src="../../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="../../assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="../../assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="../../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="../../assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="../../assets/libs/js/dashboard-ecommerce.js"></script>
</body>
</html>