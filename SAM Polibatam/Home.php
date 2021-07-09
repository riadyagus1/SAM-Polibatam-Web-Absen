<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}

include 'koneksi.php';
$nim_nik_unit   = $_SESSION['nim_nik_unit-user'];
$tbl_user       = mysqli_query($koneksi, "select * from tbl_user where nim_nik_unit='$nim_nik_unit'");
$row            = mysqli_fetch_array($tbl_user);

$dateUnformatted = date('Ymd');
$headerID = $nim_nik_unit.'-'.$dateUnformatted;

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>SAM Polibatam | Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="assets/images/favicon100.png">
    <!-- Custom CSS -->
    <link href="assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="Home.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/LogoHD.png" height="35" alt="homepage" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/TextHD.png" width="128" alt="homepage" class="dark-logo" />

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $row['foto_profile']; ?>" alt="user" class="profile-pic me-2">
                                <span class="mr-2-d-non d-lg-inline text-white small"><?= $_SESSION['nama-user'];?></span>
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Home.php" aria-expanded="false"><i class="me-3 fas fa-home "
                                    aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="History.php" aria-expanded="false">
                                <i class="me-3 fas fa-calendar-alt" aria-hidden="true"></i><span
                                    class="hide-menu">History</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Profile.php" aria-expanded="false"><i class="me-3 fa fa-user"
                                    aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Informasi.php" aria-expanded="false"><i class="me-3 fas fa-info-circle"
                                    aria-hidden="true"></i><span class="hide-menu">Informasi</span></a>
                                </li>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="Logout.php"
                                class="btn btn-danger text-white mt-4">Log Out</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Progress Presensi Hari Ini</h4>
                                <div class="text-end">
                                    <h2 id="datetime" class='font-light mb-0'>Date Now</h2>
                                    <span class="text-muted">
                                        <?php
					$dateuf = date('Ymd');
					$hID = $nim_nik_unit . "-" . $dateuf;
					$result = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status from tbl_absen_header WHERE id='$hID';"));
					$status = $result[0];

				        if ($status == "Hadir WFO" || $status == "Hadir WFH") {
                                          echo "Anda Sudah Absen Hari Ini";
					  $persenAbsen = "100%";
                                        }

					elseif ($status == "Izin") {
                                          echo "Anda Sudah Izin";
					  $persenAbsen = "100%";
                                        }

					elseif ($status == "Libur") {
                                          echo "Hari Libur";
					  $persenAbsen = "0%";
                                        }

					elseif ($status == "Kurang") {
                                          echo "Anda Belum Absen Masuk atau Pulang";
					  $persenAbsen = "50%";
                                        }

					else {
                                          echo "Anda Belum Absen Masuk & Pulang";
					  $persenAbsen = "0%";
                                        }

					?>
                                    </span>
                                        <script>
                                        const dayNames = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                                        const monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                                        var dt = new Date();
                                        var day = dt.getDay();
                                        var dd = dt.getDate();
                                        var mm = dt.getMonth();
                                        var yy = dt.getFullYear();
                                        document.getElementById("datetime").innerHTML = dayNames[day] + ", " + dd + " " + monthNames[mm] + " " + yy;
                                        </script>
                                </div>
				<?php echo "<span class='text-success'>" .$persenAbsen. "</span>"; ?>
                                <div class="progress">
			           <?php
				    	echo "<div class='progress-bar bg-success' role='progressbar' style='width:$persenAbsen; height: 6px;' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'></div>";
				   ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Presentase Kehadiran</h4>
                                <div class="text-end">
				<a href="History.php" class="btn btn-info btn-circle-lg btn-circle" style="position: absolute; top: 30%; left: 5%; color:white;"><i class="fa fa-list"></i></a>
                                    <h2 class='font-light mb-0'>
					<?php
						$total = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) from tbl_absen_header where nim_nik_unit='$nim_nik_unit' AND status != 'Libur';"));
						$presensi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) from tbl_absen_header where nim_nik_unit='$nim_nik_unit' AND status LIKE 'Hadir%';"));
						$rasio = $presensi[0] ."/". $total[0];
						$rasioPersen = ($presensi[0] / $total[0]) * 100;
						$rasioPersenString = $rasioPersen .'%';
						echo $rasio;
					?>
				   </h2>
                                    <span class="text-muted">Jumlah Kehadiran / Hari Kerja</span>
                                </div>
				<?php
                                	echo '<span class="text-info">'.$rasioPersenString.'</span>';
				?>
                                <div class="progress">
				<?php
				       echo "<div class='progress-bar bg-info' role='progressbar' style='width:$rasioPersenString; height: 6px;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>";
                                ?>
				</div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Absen Kehadiran</h4>
                                <h6 class="card-subtitle">Silahkan lakukan absen kehadiran dengan menekan tombol dibawah ini:</h6>
				<?php
					$statusAbsenMasuk = mysqli_query($koneksi, "SELECT jam_masuk from tbl_absen_masuk where id_header='$headerID';");

					if (mysqli_num_rows($statusAbsenMasuk) == 1) {
						$hasilAbsen = mysqli_fetch_array($statusAbsenMasuk);
						echo "<button id='AMasuk' onclick='window.location.href = \"AbsenMasuk.php\"' class='btn btn-info' style='color:white; margin-top:2.5%;' disabled><i class='fas fa-sign-in-alt'></i> $hasilAbsen[0]</button>";
					}

					else {
						echo "<button id='AMasuk' onclick='window.location.href = \"AbsenMasuk.php\"' class='btn btn-info' style='color:white; margin-top:2.5%;'><i class='fas fa-sign-in-alt'></i> Absen Masuk</button>";
					}
				?>

				<?php
					$statusAbsenPulang = mysqli_query($koneksi, "SELECT jam_keluar from tbl_absen_keluar where id_header='$headerID';");

					if (mysqli_num_rows($statusAbsenPulang) == 1) {
						$AbsPulang = mysqli_fetch_array($statusAbsenPulang);
						echo "<button id='APulang' onclick='window.location.href = \"AbsenKeluar.php\"' class='btn btn-info' style='color:white; margin-top:2.5%;' disabled><i class='fas fa-sign-out-alt'></i> $AbsPulang[0]</button>";
					}

					else {
						echo "<button id='APulang' onclick='window.location.href = \"AbsenKeluar.php\"' class='btn btn-info' style='color:white; margin-top:2.5%;'><i class='fas fa-sign-out-alt'></i> Absen Keluar</button>";
					}
				?>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Izin</h4>
                                <h6 class="card-subtitle"><code>Coming Soon</code></h6>
                            <a href='#' class='btn btn-secondary' onclick="lock()" style="color:white;"><i class='fas fa-envelope'></i> Ajukan Izin</a>
                            <script>
                            function lock() {
                              alert("Segera Hadir");
                            }
                            </script>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2021 SAM Polibatam by <a href="https://www.polibatam.ac.id/">polibatam.ac.id</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
