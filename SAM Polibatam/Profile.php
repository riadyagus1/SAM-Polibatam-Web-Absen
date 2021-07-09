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
    <title>SAM Polibatam | Profile</title>
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
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
                        <!-- ============================================================== -->
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
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Home.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <div id="profile-container">
                                       <image id="profileImage" src="<?php echo $row['foto_profile']; ?>" />
                                    </div>
					<form id="frm1" action="https://absen.polibatam.ac.id/Upload_Profile.php" method="post" enctype="multipart/form-data">
					    <input type="hidden" name="nnk" value="<?= $row['nim_nik_unit']?>">
	                                    <input id="imageUpload" name="imageUpload" type="file" placeholder="Photo" accept="image/png, image/jpeg" required="" capture>
				    	</form>
                                    <style>
                                        #imageUpload
                                    {
                                        display: none;
                                    }

                                    #profileImage
                                    {
                                        cursor: pointer;
                                    }

                                    #profile-container {
                                        width: 150px;
                                        height: 150px;
                                        overflow: hidden;
                                        -webkit-border-radius: 50%;
                                        -moz-border-radius: 50%;
                                        -ms-border-radius: 50%;
                                        -o-border-radius: 50%;
                                        border-radius: 50%;
                                        &:hover {
                                            background-color: rgba(0,0,0,.5);
                                            z-index: 10000;
                                            color: rgba(250,250,250,1);
                                            transition: all .3s ease;
                                          }

                                          span {
                                            display: inline-flex;
                                            padding: .2em;
                                          }
                                    }

                                    #profile-container img {
                                        width: 150px;
                                        height: 150px;
                                    }
                                    </style>

                                    <script>
                                        $("#profileImage").click(function(e) {
                                        $("#imageUpload").click();
                                    });
					$("#imageUpload").change(function(e) {
						alert("Changing Profile Photo!");
						$("#frm1").submit();
					});

                                    function fasterPreview( uploader ) {
                                        if ( uploader.files && uploader.files[0] ){
                                              $('#profileImage').attr('src', 
                                                 window.URL.createObjectURL(uploader.files[0]) );
                                        }
                                    }

                                    $("#imageUpload").change(function(){
                                        fasterPreview( this );
                                    });
                                    </script>
                                    <h4 class="card-title mt-2"><?php echo $row['name'];?></h4>
                                    <h6 class="card-subtitle"><?php echo $row['nim_nik_unit'];?></h6>
                                    <h6 class="card-subtitle"><?php echo $row['jabatan'];?></h6><br>

                                    <div class="col-md-6 col-4 align-self-center">
                                        <div class="text-end upgrade-btn">
                                            <a href="LokasiWFH.php"
                                                class="btn btn-success" style="color:white;">Ganti Lokasi WFH</a>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="post" action="EditDataKaryawan-update.php">
                                    <!-- Show Session Array
                                    <?php
                                    echo '<pre>';
                                    var_dump($_SESSION);
                                    echo '</pre>';
                                    ?>
                                    -->
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">NIM</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row['nim_nik_unit'];?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Nama Lengkap</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row['name'];?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Jabatan</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row['jabatan'];?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row['username'];?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Email</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row['email'];?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Lokasi WFH</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php 
                                            if ($row['alamat'] != null){
                                                echo $row['alamat'];
                                            } else {
                                                echo '*Lokasi WFH Belum Diajukan';
                                            }?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-12">Jam Kerja</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php 
                                            if ($row['jam_masuk'] != null && $row['jam_pulang'] != null){
                                                echo $row['jam_masuk']; 
                                                echo ' - '; 
                                                echo $row['jam_pulang'];
                                            } else {
                                                echo '*Jam Merdeka Bekerja Belum Diajukan';
                                            }?>"
                                                class="form-control ps-0 form-control-line" disabled>
                                        </div>
                                    </div>
                                    <a href="AjukanJMB.php" class="btn btn-info" style="color:white;">Ajukan Jam Mereka Bekerja</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
</body>

</html>
