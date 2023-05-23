<?php
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปลด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <style>
        .page-header {
            margin-top: auto;
        }

        .btn {
            margin-left: 30px;
        }
    </style>

    <script>
        $(document).read(function() {
            $('[data-toggle="tooltip"]').toltip();
        });
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper ">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../dist/img/emcc.png" alt="EMCC Technical" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../Dashboard.php" class="brand-link">
                <img src="../dist/img/user.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TECHNICAL </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">TECHNICAAL</a>
                    </div>
                </div> -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="../Dashboard.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../form/form.php" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    ADD NEW PEOPLE
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="change.php" class="nav-link">
                                <i class="nav-icon fas fa-user-minus"></i>
                                <p>
                                    CHANGE STATUS
                                    <span class="badge badge-info "></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../charts/chartjs.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    CHARTS
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/chartjs.php" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    CLAIM
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?logout='1'"" class=" nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                    LOGOUT
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header clearfix">
                            <div class="display-4 text-center md-1">ตารางเปลี่ยนสถานะ</div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="datatableid" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>วันที่ติดตั้ง</th>
                                                <th>วันที่ปลด</th>
                                                <th>ชื่อ</th>
                                                <th>เลขบัตรประชาชน</th>
                                                <th>หน่วยงาน</th>
                                                <th>หมายเลข EM</th>
                                                <th>ประเภทผู้กระทำความผิด</th>
                                                <th>สถานะ</th>
                                                <th>CHANGE STATUS</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select_stmt = $db->prepare("SELECT * FROM `em`
                                LEFT JOIN t_agency on t_agency.g_id = em.agency_id
                                LEFT JOIN t_status on t_status.st_id = em.status_id
                                left JOIN type on type.t_id = em.types_id");
                                            $select_stmt->execute();
                                            $result = $select_stmt->fetchAll();
                                            foreach ($result as $row) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $row["p_dst"]; ?></td>
                                                    <td><?php echo $row["p_dsp"]; ?></td>
                                                    <td><?php echo $row["p_name"]; ?></td>
                                                    <td><?php echo $row["id_card"]; ?></td>
                                                    <td><?php echo $row["g_name"]; ?></td>
                                                    <td><?php echo $row["p_em"]; ?></td>
                                                    <td><?php echo $row["t_types"]; ?></td>
                                                    <td>
                                                        <?php

                                                        if ($row['status_id'] == 2) {
                                                            echo "<span class='float-center badge badge-danger'> Inactive</span>";
                                                        } else {
                                                            echo "<span class='float-center badge badge-success'>Active</span>";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "<a href='change_up.php?change_id=" . $row['p_id'] . "'title='Update Record'
                                        data-toggle='tooltip' class = 'btn btn-warning'>CHANGE</a>";
                                                        ?>
                                                    </td>

                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatableid').DataTable();
        });
    </script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
</body>

</html>