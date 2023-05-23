<?php
include '../connection.php';
if (isset($_REQUEST['change_id'])) {
    try {
        $id = $_REQUEST['change_id'];
        $select_stmt = $db->prepare("SELECT * FROM em where p_id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(pdo::FETCH_ASSOC);
        extract($row);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
if (isset($_REQUEST['btn_insert'])) {
    $C_date_up = $_REQUEST['ch_Da'];
    $C_STA_up = $_REQUEST['ch_status'];


    if (empty($C_date_up)) {
        $errorMsg = "Please Enter Datestart";
    } else if (empty($C_STA_up)) {
        $errorMsg = "Please Enter Datestop";
    } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE  em set
                p_dsp = :CH_datestop,
                status_id = :CH_status
                where p_id = :id
                 ");
                $update_stmt->bindParam(':CH_datestop', $C_date_up);
                $update_stmt->bindParam(':CH_status', $C_STA_up);
                $update_stmt->bindParam(':id', $id);
                if ($update_stmt->execute()) {
                    $insertMsg = "เรียบร้อย !!";
                    header("refresh:2;change.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

// echo "<pre>";
// print_r($_REQUEST);
// echo "<pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLAIM</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
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
                    <a href="../Dashboard.php" class="nav-link">Home</a>
                    <!-- </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../Dashboard.php" class="brand-link">
                <img src="../dist/img/user.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TECHNICAL </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
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
                            <a href="../chnge/change.php" class="nav-link">
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
                            <a href="claim.php" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    CLAIM
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index.php?logout='1'" class=" nav-link">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- AREA CHART -->
                            <div class="card card-danger">
                                <div class="card-header text-center">
                                    <h3 class="card-title text-center">ปลดอุปกรณ์</h3>

                                </div>
                                <?php if (isset($errorMsg)) {
                                ?>
                                    <div class="alert alert-danger">
                                        <strong> Wrong! <?php echo $errorMsg ?></strong>
                                    </div>
                                <?php } ?>
                                <?php if (isset($insertMsg)) {
                                ?>
                                    <div class="alert alert-success">
                                        <strong> เปลี่ยนสถานะ <?php echo $insertMsg ?></strong>
                                    </div>
                                <?php } ?>
                                <div class="card-tools">

                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>วันที่ปลด</label>
                                                    <input type="date" class="form-control" id="datepicker" name="ch_Da">
                                                </div>
                                            </div>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>สถานะ</label>
                                                    <select name="ch_status" class="form-control" rows="3" placeholder="Enter" required>
                                                        <option value="">เลือก</option>
                                                        <?php
                                                        $sql = $db->prepare("SELECT * FROM `t_status`
                                            ");
                                                        $sql->execute();
                                                        $agencys = $sql->fetchAll();
                                                        foreach ($agencys as $row) {
                                                            echo "
                                            <option value='" . $row['st_id'] . "'>" . $row['st_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <?php echo "<label>ชื่อ</label><br>" . $p_name; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <?php echo "<label>เลขบัตรประชาชน</label><br>" . $id_card; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group"> <?php echo "<label>หมายเลข EM</label><br>" . $p_em; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-2"></div>
                                            <div class="form-groupd">
                                                <input type="submit" name="btn_insert" class="btn btn-primary" value="บันทึก">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                <a href="change.php" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col (LEFT) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>



    <!--- claim -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->

    <script>
        var date = new Date();
        var year = date.getFullYear();
        var mont = date.getMonth() + 1;
        var todayDate = String(date.getDate()).padStart(2, '0');
        var datePattern = year + '-' + mont + '-' + todayDate;
        document.getElementById("datepicker").value = datePattern;
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatableid').DataTable();
        });
    </script>
</body>
</body>

</html>