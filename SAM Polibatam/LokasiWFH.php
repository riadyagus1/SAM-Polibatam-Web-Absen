<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
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
    <title>SAM Polibatam | Ganti Lokasi WFH</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon100.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/DataTables/Bootstrap-4-4.1.1/css/dataTables.bootstrap4.min.css">
    <script src="../assets/plugins/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/DataTables/Bootstrap-4-4.1.1/js/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/gmaps/redirect.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCNJqakPdB3zozQKYUc-IFOMnokYiSRNH8"></script>
    <script>
        var marker;
  
        function taruhMarker(peta, posisiTitik){
            
            if( marker ){
              // pindahkan marker
              marker.setPosition(posisiTitik);
            } else {
              // buat marker baru
              marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
              });
            }
          
             // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
            
        }

        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(1.118383,104.04846),
            zoom:16,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
          google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
          });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
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
                            <img src="../assets/images/LogoHD.png" height="35" alt="homepage" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../assets/images/TextHD.png" width="128" alt="homepage" class="dark-logo" />

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
                                <img src="../assets/images/users/9.png" alt="user" class="profile-pic me-2">
                                <span class="mr-2-d-non d-lg-inline text-white small"><?= $_SESSION['nama'];?></span>
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
                        <h3 class="page-title mb-0 p-0">Ganti Lokasi WFH</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Home.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="Profile.php">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ganti Lokasi WFH</li>
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
                <div id="googleMap" style="width:100%;height:650px;"></div>
                <br>
                <!-- Show Current Time
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $date = date('Y/m/d H:i:s', time());
                echo "Jam Saat Ini: " . $date;
                ?>
                -->
                <h5>Data Yang Akan Diajukan:</h5>
                <form class="form-horizontal form-material mx-2" method="post" action="LokasiWFHtambah.php">
                    <div class="form-group">
                    <label class="col-md-12 mb-0">Latitude</label>
                         <div class="col-md-12">
                            <input type="text" id="lat" placeholder="Latitude" name="lat" class="form-control ps-0 form-control-line">
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $_SESSION['nim_nik_unit'];?>" name="nim" class="form-control ps-0 form-control-line">

                    <div class="form-group">
                    <label class="col-md-12 mb-0">Longitude</label>
                        <div class="col-md-12">
                            <input type="text" id="lng" placeholder="Latitude" name="lng" class="form-control ps-0 form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-12 mb-0">Lokasi</label>
                        <div class="col-md-12">
                            <input type="text" id="address" placeholder="Lokasi" name="address" class="form-control ps-0 form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="simpan" class='btn btn-success d-none d-md-inline-block text-white'>Ajukan Lokasi WFH</button>
                            <a href='Profile.php' class='btn btn-danger d-none d-md-inline-block text-white'>Kembali</a>         
                    </div>
                </form>
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
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>
