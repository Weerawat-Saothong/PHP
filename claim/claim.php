<?php
include '../connection.php';
if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select = $db->prepare("SELECT * FROM t_claims where c_id = :id");
    $select->bindParam(':id', $id);
    $select->execute();
    $row = $select->fetch(pdo::FETCH_ASSOC);

    $delete_stmt = $db->prepare(" DELETE from t_claims where c_id = :id");
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header('Location:claim.php');
}

if (isset($_REQUEST['btn_insert'])) {
    $C_date = $_REQUEST['c_Da'];
    $C_NUM = $_REQUEST['cnumber'];
    $C_NAME = $_REQUEST['cname'];
    $C_ag =  $_REQUEST['c_agency'];
    $C_DET = $_REQUEST['c_det'];


    if (empty($C_date)) {
        $errorMsg = "Please Enter Datestart";
    } else if (empty($C_NUM)) {
        $errorMsg = "Please Enter Datestop";
    } else if (empty($C_NAME)) {
        $errorMsg = "Please Enter Sex";
    } else if (empty($C_ag)) {
        $errorMsg = "Please Enter Name";
    } else if (empty($C_DET)) {
        $errorMsg = "Please Enter ID Card";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO t_claims (c_date , c_cnb , c_name , c_agency , c_detail)
                VALUES(:CDATE,
                 :CNUM,
                 :CNAME,
                 :Cagency,
                 :CDET);
                 ");
                $insert_stmt->bindParam(':CDATE', $C_date);
                $insert_stmt->bindParam(':CNUM', $C_NUM);
                $insert_stmt->bindParam(':CNAME', $C_NAME);
                $insert_stmt->bindParam(':Cagency', $C_ag);
                $insert_stmt->bindParam(':CDET', $C_DET);
                if ($insert_stmt->execute()) {
                    $insertMsg = "Insert Successfully...";
                    header("refresh:2;claim.php");
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
                        <li class="nav-item">
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
                        <li class="nav-item">
                            <a href="../chnge/change.php" class="nav-link">
                                <i class="nav-icon fas fa-user-minus"></i>
                                <p>
                                    CHANGE STATUS
                                    <span class="badge badge-info "></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/chartjs.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    CHARTS
                                </p>
                            </a>
                        </li>
                        <li class="nav-item  menu-open">
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>CLAIM</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- AREA CHART -->
                            <div class="card card-success">
                                <div class="card-header text-center">
                                    <h3 class="card-title text-center">ADD CLAIM</h3>
                                    <?php if (isset($errorMsg)) {
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong> Wrong! <?php echo $errorMsg ?></strong>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($insertMsg)) {
                                    ?>
                                        <div class="alert alert-success">
                                            <strong> Success ! <?php echo $insertMsg ?></strong>
                                        </div>
                                    <?php } ?>
                                    <div class="card-tools">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>DATE</label>
                                                    <input type="date" class="form-control" id="datepicker" name="c_Da">
                                                </div>
                                            </div>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>CLAIM_NUMBER</label>
                                                    <input type="text" class="form-control" name="cnumber">
                                                </div>
                                            </div>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>ชื่อ</label>
                                                    <input type="text" class="form-control" name="cname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>หน่วยงาน</label>

                                                    <select name="c_agency" class="form-control" rows="3" placeholder="Enter" required>
                                                        <option value="">เลือก</option>
                                                        <?php
                                                        $sql = $db->prepare("SELECT * FROM `t_agency`
                                                         ");
                                                        $sql->execute();
                                                        $agencys = $sql->fetchAll();
                                                        foreach ($agencys as $row) {
                                                            echo "
                                            <option value='" . $row['g_id'] . "'>" . $row['g_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>&ensp;&ensp;&ensp;
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>รายละะเอียด</label>
                                                    <textarea type="text" class="form-control" name="c_det"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-2"></div>
                                            <div class="form-groupd">
                                                <input type="submit" name="btn_insert" class="btn btn-primary" value="เพิ่มเคลม">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <!-- LINE CHART -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">SHOW CLAIM</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <table class="table m-0 " id="datatableid">
                                            <thead>
                                                <tr>

                                                    <th>หมายเลขอ้างอิงเคส</th>
                                                    <th>ชื่อ</th>
                                                    <th>สำนักงาน</th>
                                                    <th>รายละเอียด</th>
                                                    <th>DELETE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select_stmt = $db->prepare("SELECT * FROM t_claims
                                LEFT JOIN t_agency on t_agency.g_id=t_claims.c_agency");
                                                $select_stmt->execute();
                                                $result = $select_stmt->fetchAll();
                                                foreach ($result as $row) {
                                                ?>

                                                    <tr>
                                                        <td><?php echo $row["c_cnb"]; ?></td>
                                                        <td><?php echo $row["c_name"]; ?></td>
                                                        <td><?php echo $row["g_name"]; ?></td>
                                                        <td><?php echo $row["c_detail"]; ?></td>
                                                        <td><a href="?delete_id= <?php echo $row["c_id"]; ?>" title='Delete Record' data-toggle='tooltip' class='btn btn-danger '>Delete</a></td>

                                                        <!-- <td>
                                      

                                        // if ($row['status_id'] == 2) {
                                        //   echo "<span class='float-center badge badge-danger'> Inactive</span>";
                                        // } else {
                                        //   echo "<span class='float-center badge badge-success'>Active</span>";
                                        // }

                                        
                                    </td> -->

                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col (RIGHT) -->
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
    <script>
        $(document).read(function() {
            $('[data-toggle="tooltip"]').toltip();
        });
    </script>
</body>
</body>

</html>