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

if(isset($_POST['report'])) {
	setcookie("report", $_POST['report']);
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>SAM Polibatam | Absen Keluar</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="assets/images/favicon100.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- Camera -->
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js "></script>
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
                        <h3 class="page-title mb-0 p-0">Absen Keluar (Verifikasi Foto)</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Home.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Absen Keluar</li>
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
                <style>
                table, input {
                    width: auto;
                    font: 20px Calibri;
                }
                table, th, td, th {
                    border: solid 1px #DDD;
                    border-collapse: collapse;
                    padding: 2px 3px;
                    text-align: center;
                    font-weight: normal;
                }
                #camBox{
                    display:none;
                    position:fixed;
                    border:0;
                    top:0;
                    right:0;
                    left:0;
                    overflow-x:auto;
                    overflow-y:hidden;
                    z-index:9999;
                    background-color:rgba(239,239,239,.9);
                    width:100%;
                    height:100%;
                    padding-top:10px;
                    text-align:center;
                    cursor:pointer;
                    -webkit-box-align:center;-webkit-box-orient:vertical;
                    -webkit-box-pack:center;-webkit-transition:.2s opacity;
                    -webkit-perspective:1000
                }

                .revdivshowimg{
                    width:300px;
                    top:0;
                    padding:0;
                    position:relative;
                    margin:0 auto;
                    display:block;
                    background-color:#fff;
                    webkit-box-shadow:6px 0 10px rgba(0,0,0,.2),-6px 0 10px rgba(0,0,0,.2);
                    -moz-box-shadow:6px 0 10px rgba(0,0,0,.2),-6px 0 10px rgba(0,0,0,.2);
                    box-shadow:6px 0 10px rgba(0,0,0,.2),-6px 0 10px rgba(0,0,0,.2);
                    overflow:hidden;
                    border-radius:3px;
                    color:#17293c
                }        
            </style>
                <center>
                    <div id="camBox" style="width:100%;height:100%;">
                        <div class="revdivshowimg" style="top:20%;text-align:center;margin:0 auto;">

                            <div id="camera" style="height:auto;text-align:center;margin:0 auto;"></div>

                            <p>
                                <input type="button" value="OK" id="btAddPicture" 
                                    onclick="addCamPicture()" /> 
                                <input type="button" value="Cancel" 
                                    onclick="document.getElementById('camBox').style.display = 'none';" />
                            </p>
                            <input type="hidden" id="rowid" /><input type="hidden" id="dataurl" />
                        </div>

                    </div>

                    <div>
                        <table id="myTable">
                            <tbody>
                                <tr><th>Foto Kehadiran</th></tr>
                                <tr>
                                    <td>
                                        <div id="div_alpha"></div>
                                        <br>
                                        <input type="button" class='btn btn-info' style="color:white;" value="Ambil Foto" id="alpha" 
                                            onclick="takeSnapshot(this)" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </center>
                <script>
                    // CAMERA SETTINGS.
                    Webcam.set({
                        width: 220,
                        height: 190,
                        image_format: 'jpeg',
                        jpeg_quality: 100
                    });
                    Webcam.attach('#camera');

                    takeSnapshot = function (oButton) {
                        document.getElementById('camBox').style.display = 'block';
                        document.getElementById('rowid').value = oButton.id
                    }

                    addCamPicture = function () {
                        var rowid = document.getElementById('rowid').value;

                        Webcam.snap(function (data_uri) {
                            document.getElementById('div_' + rowid).innerHTML =
                                '<img src="' + data_uri + '" id="" width="225px" height="250px" />';
			    document.getElementById('imageSrc').value = data_uri;
                        });

                        document.getElementById('rowid').value = '';
                        document.getElementById('camBox').style.display = 'none';       // HIDE THE POPUP DIALOG BOX.
                    }
                </script>
                <br>
		<form id="formPulang" name="formPulang" method="POST" action="AbsenPulang-process.php">
                	<button class='btn btn-success' style="color:white;">Absen Keluar</button>
                	<a href='AbsenKeluar-report.php' class='btn btn-danger' style="color:white;">Kembali</a>
			<input type="hidden" name="imageSrc" id="imageSrc" value=""></input>
		</form>
                <br><br>
                <p>*Silahkan <code> Ambil Foto </code> terlebih dahulu sebelum menekan tombol Lanjut. <br>Jika foto yang diambil kurang bagus, Silahkan tekan <code> Ambil Foto </code> lagi untuk mengambil ulang foto</p>
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
