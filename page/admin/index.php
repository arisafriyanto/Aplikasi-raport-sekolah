<?php 

    session_start();

    require "../../functions.php";
    

    if(!isset($_SESSION['login'])) {
        header("location: ../../index.php");
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
                                            <a href="?page=siswa" class="connection-item">
                                                <i class="fas fa-address-book"></i>
                                                    <span>Siswa</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=guru" class="connection-item">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>Guru</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=nilai" class="connection-item">
                                                <i class="fas fa-edit"></i>
                                                <span>Nilai</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=matapelajaran" class="connection-item">
                                                <i class="fas fa-book"></i>
                                                <span>Pelajaran</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=kelas_siswa" class="connection-item">
                                                <i class="fas fa-address-card"></i>
                                                <span>Kelas Siswa</span>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="?page=kelas" class="connection-item">
                                                <i class="fas fa-industry"></i>
                                                <span>Kelas</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
						</li>
						
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="../../assets/img/aaa.jpg" alt="" class="user-avatar-md rounded-circle">
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
                                <a class="nav-link" href="?page=siswa">
                                    <i class="fas fa-address-book"></i>Data Siswa
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="?page=guru">
                                    <i class="fas fa-calendar-alt"></i>Data Guru
                                </a>
                            </li>





                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                                    <i class="fas fa-chart-bar"></i>Akademik
                                </a>

                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="navbar-nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=matapelajaran"><i class="fas fa-book"></i> Mata Pelajaran</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=kelas"><i class="fas fa-industry"></i>Kelas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=kelas_siswa"><i class="fas fa-address-card"></i> Kelas Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=nilai"><i class="fas fa-edit"></i>Nilai</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>






                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                    <i class="fas fa-print"></i>Cetak
                                </a>

                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="navbar-nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=laporansiswa"><i class="fas fa-file-pdf"></i> Laporan Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=laporanguru"><i class="fas fa-file-pdf"></i>Laporan Guru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=laporankelas"><i class="fas fa-file-pdf"></i> Laporan Kelas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=laporannilai"><i class="fas fa-file-pdf"></i> Laporan Nilai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=laporanpelajaran"><i class="fas fa-file-pdf"></i> Laporan Pelajaran</a>
                                        </li>

                                    </ul>
                                </div>
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

			if($page  == "siswa") {
				if($action == "") {
					include "siswa/siswa.php";
				}else if($action == "insert") {
					include "siswa/insert.php";					
				}else if($action == "update") {
					include "siswa/update.php";					
				}else if($action == "delete") {
					include "siswa/delete.php";					
				} 
			}else if($page == "guru" ) {
				if($action == "") {
					include "guru/guru.php";
				}else if($action == "insert") {
					include "guru/insert.php";
				}else if($action == "update") {
					include "guru/update.php";
				}else if($action == "delete") {
					include "guru/delete.php";
				}
			}else if($page == "matapelajaran") {
				if($action == "") {
					include "mata pelajaran/mapel.php";
				}else if($action == "insert") {
					include "mata pelajaran/insert.php";
				}else if($action == "update") {
					include "mata pelajaran/update.php";
				}else if($action == "delete") {
					include "mata pelajaran/delete.php";
				}
			}else if($page == "kelas") {
				if($action == "") {
					include "kelas/kelas.php";
				}else if($action == "insert") {
					include "kelas/insert.php";
				}else if($action == "update") {
					include "kelas/update.php";
				}else if($action == "delete") {
					include "kelas/delete.php";
				}
			}else if($page == "kelas_siswa") {
				if($action == "") {
					include "kelas siswa/kelas_siswa.php";
				}else if($action == "insert") {
					include "kelas siswa/insert.php";
				}else if($action == "update") {
					include "kelas siswa/update.php";
				}else if($action == "delete") {
					include "kelas siswa/delete.php";
				}
			}else if($page == "nilai") {
				if($action == "") {
					include "nilai/nilai.php";
				}else if($action == "insert") {
					include "nilai/insert.php";
				}else if($action == "detail") {
					include "nilai/detail/detail.php";
				}else if($action == "update") {
					include "nilai/detail/update.php";
				}else if($action == "delete") {
					include "nilai/detail/delete.php";
				}
			}else if($page == "") {
				include "../../home.php";
			}else if($page == "laporansiswa") {
                if($action == "") {
                    include "laporan/laporan siswa/laporan_siswa.php";
                }
            }else if($page == "laporanguru") {
                if($action == "") {
                    include "laporan/laporan guru/laporan_guru.php";
                }
            }else if($page == "laporankelas") {
                if($action == "") {
                    include "laporan/laporan kelas/laporan_kelas.php";
                }
            }else if($page == "laporannilai") {
                if($action == "") {
                    include "laporan/laporan nilai/data_nilai.php";
                }else if($action == "detail") {
                    include "laporan/laporan nilai/detail/detail.php";
                }
            }else if($page == "laporanpelajaran") {
                if($action == "") {
                    include "laporan/laporan pelajaran/laporan_pelajaran.php";
                }
            }else if($page == "profile") {
                if($action == "account") {
                    include "profile/account.php";
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

<script src="../../assets/js/siswa.js"></script>
<script src="../../assets/js/guru.js"></script>
<script src="../../assets/js/mapel.js"></script>
<script src="../../assets/js/kelas.js"></script>
<script src="../../assets/js/kelas_siswa.js"></script>
<script src="../../assets/js/nilai.js"></script>


<!-- 
institut teknologi bandung
institut teknologi sepuluh november
universitas diponegoro -->


</body>
</html>