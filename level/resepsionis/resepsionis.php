<?php

include('../../config/koneksi.php');
$totalTamu = mysqli_query($con, 'SELECT COUNT(id_user) as totalTamu FROM tb_users WHERE id_level = 3');
$totalTamu = mysqli_fetch_assoc($totalTamu)['totalTamu'];

$totalCheckin = mysqli_query($con, "SELECT COUNT(id_order) as totalCheckin FROM tb_order WHERE check_in = '" . date('Y-m-d') . "'");
$totalCheckin = mysqli_fetch_assoc($totalCheckin)['totalCheckin'];

$totalCheckout = mysqli_query($con, "SELECT COUNT(id_order) as totalCheckout FROM tb_order WHERE check_in = '" . date('Y-m-d') . "'");
$totalCheckout = mysqli_fetch_assoc($totalCheckout)['totalCheckout'];

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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
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
            <a href="resepsionis.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Hotel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="resepsionis.php" class="d-block">Rizky Maulana</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="resepsionis.php"
                                class="nav-link <?= (empty($_GET['page'])  == 'profile') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="resepsionis.php?page=data-reservasi2"
                                class="nav-link <?= (empty($_GET['page'])  == 'resepsionis') ?: '' ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Data Reservasi
                                </p>
                            </a>
                        </li>
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
                        <div class="col-12 col-sm-6 col-md-4">
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
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bed"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Check In Hari Ini</span>
                                    <span class="info-box-number"></span>
                                    <?= $totalCheckin ?>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Check Out Hari Ini</span>
                                    <span class="info-box-number"></span>
                                    <?= $totalCheckout ?>
                                </div>
                            </div>
                        </div>
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
                                include 'data-reservasi.php';
                                break;
                            case "detail":
                                include 'detail.php';
                                break;
                            case "data-reservasi2":
                                include 'data-reservasi2.php';
                                break;
                            case "cari":
                                include 'cari-data.php';
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
        <strong>Copyright &copy; 2022 <a href="#">Hotel Hebat</a>.</strong>
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

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#data').DataTable({
            "info": false
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#data2').DataTable({
            "info": false
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#data3').DataTable({
            "info": false
        });
    });
    </script>

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