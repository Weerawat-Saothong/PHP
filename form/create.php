<?php
include '../connection.php';
if (isset($_REQUEST['btn_insert'])) {
    $em_datestart = $_REQUEST['datestart'];
    $em_datestop = $_REQUEST['datestop'];
    $em_Status = $_REQUEST['status'];
    $em_sex = $_REQUEST['sexname'];
    $em_name = $_REQUEST['emname'];
    $em_IdCrad = $_REQUEST['id_card'];
    $em_Agency = $_REQUEST['agency'];
    $em_EmName = $_REQUEST['Em_name'];
    $em_oft = $_REQUEST['offten'];
    $em_rule = $_REQUEST['rule'];
    $em_types = $_REQUEST['types'];



    if (empty($em_datestart)) {
        $errorMsg = "Please Enter Datestart";
    } else if (empty($em_datestop)) {
        $errorMsg = "Please Enter Datestop";
    } else if (empty($em_sex)) {
        $errorMsg = "Please Enter Sex";
    } else if (empty($em_name)) {
        $errorMsg = "Please Enter Name";
    } else if (empty($em_IdCrad)) {
        $errorMsg = "Please Enter ID Card";
    } else if (empty($em_Agency)) {
        $errorMsg = "Please Enter ID Agency";
    } else if (empty($em_EmName)) {
        $errorMsg = "Please Enter EM Number";
    } else if (empty($em_oft)) {
        $errorMsg = "Please Enter Offense";
    } else if (empty($em_rule)) {
        $errorMsg = "Please Enter Rule";
    } else if (empty($em_types)) {
        $errorMsg = "Please Enter Types";
    } else if (empty($em_Status)) {
        $errorMsg = "Please Enter Status";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO em (p_dst ,p_dsp, status_id ,sex_id,p_name, id_card ,agency_id ,p_em , p_of,p_rule ,types_id )
                VALUES(:EDatestart,
                       :EDatestop,
                       :EStatus,
                       :ESex,
                       :EName,
                       :EIDCard,
                       :EAgency,
                       :EEMNumber,
                       :EOffense,
                       :Rule,
                       :ETypest);
                  ");
                $insert_stmt->bindParam(':EDatestart', $em_datestart);
                $insert_stmt->bindParam(':EDatestop', $em_datestop);
                $insert_stmt->bindParam(':EStatus', $em_Status);
                $insert_stmt->bindParam(':ESex', $em_sex);
                $insert_stmt->bindParam(':EName', $em_name);
                $insert_stmt->bindParam(':EIDCard', $em_IdCrad);
                $insert_stmt->bindParam(':EAgency', $em_Agency);
                $insert_stmt->bindParam(':EEMNumber', $em_EmName);
                $insert_stmt->bindParam(':EOffense', $em_oft);
                $insert_stmt->bindParam(':Rule', $em_rule);
                $insert_stmt->bindParam(':ETypest', $em_types);
                if ($insert_stmt->execute()) {
                    $insertMsg = "Insert Successfully...";
                    header("refresh:2;form.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href=".">
    <title>ADD PEOPLE</title>
    <style>
        .page-header {
            text-align: center;

        }

        p {
            text-align: center;
        }

        .form-group {
            margin: 0 auto;
        }

        .card-body {
            width: 1500px;
            margin-left: 100px;
        }
    </style>

</head>

<body>
    <div class="wrapper ">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../dist/img/emcc.png" alt="EMCC Technical" height="60" width="60">
        </div>

        <!-- Navbar -->
     

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
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
                        <li class="nav-item menu-open">
                            <a href="form.php" class="nav-link">
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
                        <li class="nav-item">
                            <a href="../pages/charts/chartjs.html" class="nav-link">
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


        <div class="content-wrapper">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="dispiay-2 text-center">ADD PEOPLE</h3>
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
                        <strong> Success ! <?php echo $insertMsg ?></strong>
                    </div>
                <?php } ?>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>วันที่ติดตั้ง</label>
                                    <input type="date" class="form-control" id="datepicker" name="datestart" placeholder="Enter ">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>วันที่ปลด</label>
                                    <input type="date" id="datepicker" class="form-control" name="datestop" placeholder="Enter ...">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>สถานะ</label>
                                    <select name="status" class="form-control" rows="3" placeholder="Enter" required>
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
                            </div>
                            <div class="col-sm-4">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <label>เพศ</label>
                                    <select name="sexname" class="form-control" rows="3" placeholder="Enter" required>
                                        <option value="">เลือก</option>
                                        <?php
                                        $sql = $db->prepare("SELECT * FROM t_sex                      
                                        ");
                                        $sql->execute();
                                        $agencys = $sql->fetchAll();
                                        foreach ($agencys as $row) {
                                            echo "
                                            <option value='" . $row['s_id'] . "'>" . $row['s_name'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="emname" placeholder="โปรดกรอก ชื่อ-สกุล">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control" name="id_card" placeholder="โปรดกรอกหมายเลขบัตร">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <!-- textarea -->
                                <div class="form-search">
                                    <label>หน่วยงาน</label>
                                    <select name="agency" class="form-control" rows="3" placeholder="Enter" data-live-search="true" required>
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
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>หมายเลข EM</label>
                                    <input class="form-control" rows="3" name="Em_name" placeholder="โปรดกรอกหมายเลข EM">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <!-- textarea -->
                                <div class="form-search">
                                    <label>ฐานความผิด</label>
                                    <select name="offten" class="form-control" rows="3" placeholder="Enter" data-live-search="true"  required>
                                        <option value="">เลือก</option>
                                        <?php
                                        $sql = $db->prepare("SELECT * FROM `t_offense`
                                            ");
                                        $sql->execute();
                                        $agencys = $sql->fetchAll();
                                        foreach ($agencys as $row) {
                                            echo "
                                            <option value='" . $row['of_id'] . "'>" . $row['of_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-search">
                                    <label>เงือนไขการกระทำความผิด</label>
                                    <select name="rule" class="form-control" rows="3" placeholder="Enter" data-live-search="true"  required>
                                        <option value="">เลือก</option>
                                        <?php
                                        $sql = $db->prepare("SELECT * FROM `t_rule`
                                            ");
                                        $sql->execute();
                                        $agencys = $sql->fetchAll();
                                        foreach ($agencys as $row) {
                                            echo "
                                            <option value='" . $row['r_id'] . "'>" . $row['r_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>ประเภทผู้กระทำความผิด</label>
                                    <select name="types" class="form-control" rows="3" placeholder="Enter" required>
                                        <option value="">เลือก</option>
                                        <?php
                                        $sql = $db->prepare("SELECT * FROM `type`");
                                        $sql->execute();
                                        $agencys = $sql->fetchAll();
                                        foreach ($agencys as $row) {
                                            echo "
                                            <option value='" . $row['t_id'] . "'>" . $row['t_types'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div><br><br>

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="submit" name="btn_insert" class="btn btn-primary" value="เพิ่มบุคคล">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                    <a href="form.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>




                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <footer class="main-footer">
            <strong>FORTH 2021 <a href="https://dop.forthtag.com/">EMCC</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <script>
        var date = new Date();
        var year = date.getFullYear();
        var mont = date.getMonth() + 1;
        var todayDate = String(date.getDate()).padStart(2, '0');
        var datePattern = year + '-' + mont + '-' + todayDate;
        document.getElementById("datepicker").value = datePattern;
    </script>
    <script>
        $(document).ready(function(){
        $('.form-search select').selectpicker();})
    </script>

</body>

</html>