<?php

include('../../config/koneksi.php');
$totalTamu = mysqli_query($con, 'SELECT COUNT(id_user) as totalTamu FROM tb_users WHERE id_level = 3');
$totalTamu = mysqli_fetch_assoc($totalTamu)['totalTamu'];

$totalKamar = mysqli_query($con, 'SELECT COUNT(id_kamar) as totalKamar FROM tb_kamar');
$totalKamar = mysqli_fetch_assoc($totalKamar)['totalKamar'];

$totalResepsionis = mysqli_query($con, 'SELECT COUNT(id_user) as totalResepsionis FROM tb_users WHERE id_level = 2');
$totalResepsionis = mysqli_fetch_assoc($totalResepsionis)['totalResepsionis'];

$totalAdmin = mysqli_query($con, 'SELECT COUNT(id_user) as totalAdmin FROM tb_users WHERE id_level = 1');
$totalAdmin = mysqli_fetch_assoc($totalAdmin)['totalAdmin'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="../../logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Hotel Hebat</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Hotel Hebat</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php"
                                class="nav-link <?= (empty($_GET['page'])  == 'profile') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=admin" class="nav-link <?= ($_GET['page'] == 'admin') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=resepsionis"
                                class="nav-link <?= ($_GET['page'] == 'resepsionis') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Resepsionis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=kamar"
                                class="nav-link <?= ($_GET['page'] == 'kamar') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>Fasilitas Kamar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=fasilitas"
                                class="nav-link <?= ($_GET['page'] == 'fasilitas') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>Fasilitas Umum</p>
                            </a>
                        </li>
                    </ul>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Tamu</span>
                                    <span class="info-box-number">
                                        <?= $totalTamu ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bed"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Tipe Kamar</span>
                                    <span class="info-box-number"></span>
                                    <?= $totalKamar ?>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Resepsionis</span>
                                    <span class="info-box-number"></span>
                                    <?= $totalResepsionis ?>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Admin</span>
                                    <span class="info-box-number"></span>
                                    <?= $totalAdmin  ?>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <?php
                        if (!empty($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = '';
                        }
                        switch ($page) {
                            case "":
                                include 'data-user.php';
                                break;
                            case "profile":
                                include 'profile.php';
                                break;
                            case "resepsionis":
                                include 'resepsionis.php';
                                break;
                            case "fasilitas":
                                include 'fasilitas-umum.php';
                                break;
                            case "kamar":
                                include 'kelola-kamar.php';
                                break;
                            case "admin":
                                include 'admin.php';
                                break;
                            case "detail":
                                include 'detail.php';
                                break;
                            case "edit-fasilitas":
                                include 'edit-fasilitas-umum.php';
                                break;
                            case "edit-kamar":
                                include 'edit-kelola-kamar.php';
                                break;
                            case "detail-resepsionis":
                                include 'detail-resepsionis.php';
                                break;
                            case "detail-admin":
                                include 'detail-admin.php';
                                break;
                            case "detail-data-user":
                                include 'detail-data-user.php';
                                break;
                            case "tambah-fasilitas":
                                include 'tambah-fasilitas-umum.php';
                                break;
                            case "tambah-kamar":
                                include 'tambah-kelola-kamar.php';
                                break;
                            case "tambah-resepsionis":
                                include 'tambah-resepsionis.php';
                                break;
                            case "tambah-admin":
                                include 'tambah-admin.php';
                                break;
                            case "tambah-tamu":
                                include 'tambah-data-user.php';
                                break;
                        }
                        ?>
                    </div>

                    <!-- Main row -->
                    <div class="row">

                        <!-- Left col -->
                        <div class="col-md-8">

                            <!-- /.card -->
                            <div class="row">
                                <div class="col-md-6">

                                    <!--/.direct-chat -->
                                </div>
                                <!-- /.col -->

                                <div class="col-md-6">
                                    <!--/.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-4">
                            <!-- /.info-box -->
                            <!-- /.info-box -->
                            <!-- /.card -->
                            <!-- /.card-header -->
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="">Hotel Hebat</a>.</strong>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>