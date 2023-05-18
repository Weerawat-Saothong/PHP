<?php
require_once('connection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMCC Technical</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/emcc.png" alt="EMCC Technical" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="Dashboard.php" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
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

        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="Dashboard.php" class="brand-link">
        <img src="dist/img/user.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TECHNICAL </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-1 pb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block">TECHNICAAL</a>
          </div>
        </div>
 -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="./Dashboard.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./form/form.php" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  ADD NEW PEOPLE
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="chnge/change.php" class="nav-link">
                <i class="nav-icon fas fa-user-minus"></i>
                <p>
                  CHANGE STATUS
                  <span class="badge badge-info "></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./charts/chartjs.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  CHARTS
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./claim/claim.php" class="nav-link">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">EMCC Dashboard</h1>
            </div><!-- /.col -->
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
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <a href="./page/total.php" class="nav-link text-white">

                  <?php
                  $select_stmt = $db->prepare("SELECT count(p_id) as total from em  ");
                  $select_stmt->execute();
                  $result = $select_stmt->fetchAll();
                  foreach ($result as $row) {
                  ?>
                    <div class="info-box-content">
                      <span class="info-box-text">TOTAL</span>
                      <?php echo "<span class='info-box-number'>" . $row["total"];
                      "</span>" ?>

                    </div>
                  <?php } ?>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">ACTIVE</span>
                  <a href="./page/ACTIVE.php" class="nav-link text-white">
                    <?php
                    $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as ptotal FROM t_status AS T 
                     LEFT JOIN em as p on T.st_id=p.status_id
                     GROUP by T.st_id ");
                    $select_stmt->execute();
                    $result = $select_stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>

                      <?php
                      if ($row['st_name'] == "Active") {
                        echo "<span class='info-box-number'>" . $row["ptotal"];
                        "</span>";
                      } ?>

                    <?php } ?>
                  </a>
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
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">INACTIVE</span>
                  <a href="./page/Inactive.php" class="nav-link text-white">
                    <?php
                    $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as ptotal FROM t_status AS T 
                     LEFT JOIN em as p on T.st_id=p.status_id
                     GROUP by T.st_id ");
                    $select_stmt->execute();
                    $result = $select_stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>
                      <?php
                      if ($row['st_name'] == "Inactive") {
                        echo "<span class='info-box-number'>" . $row["ptotal"];
                        "</span>";
                      } ?>

                    <?php } ?>
                  </a>
                </div>

                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!--  -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <!-- 
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="card">
                        <!-- /หน่วยงาน -->
                        <div class="card-header border-transparent">
                          <h3 class="card-title text-center">สำนักงานที่ติดตั้งวันนี้</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table m-0 " id="datatableid">
                              <thead>
                                <tr>

                                  <th>หน่วยงาน</th>
                                  <th>จำนวน</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT t_agency.g_id,t_agency.g_name,COUNT(*)as t FROM t_agency
                                LEFT JOIN em on em.agency_id=t_agency.g_id
                                LEFT JOIN t_status on em.status_id=t_status.st_id
                                WHERE st_id=1  and  em.p_dst = curdate()
                                GROUP BY t_agency.g_name ");
                                $select_stmt->execute();
                                $result = $select_stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>

                                  <tr>
                                    <td><?php echo $row["g_name"]; ?></td>
                                    <td><?php echo $row["t"]; ?></td>
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
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">
                          <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                          <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                        </div> -->
                        <!-- /.card-footer -->
                      </div> <!-- /.หน่วยงาน-->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <!-- ประเภทผู้กระทำความผิด-->
                      <!-- Info Boxes Style 2 -->
                      <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text"> ผู้ถูกคุมความประพฤติ </span>
                          <?php
                          $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as d
                                FROM type AS T 
                                LEFT JOIN em as p on T.t_id=p.types_id
                                GROUP by T.t_id ");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {

                            if ($row['t_id'] == 1) {
                              echo " <span class='info-box-number'>" . $row["d"];
                              "</span>";
                            } ?>
                          <?php } ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text"> ผู้ได้รับการพักการลงโทษ</span>
                          <?php
                          $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as d
                                FROM type AS T 
                                LEFT JOIN em as p on T.t_id=p.types_id
                                GROUP by T.t_id ");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {

                            if ($row['t_id'] == 2) {
                              echo " <span class='info-box-number'>" . $row["d"];
                              "</span>";
                            } ?>
                          <?php } ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box mb-3 bg-lime">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text ">ผู้ได้รับการลดการลงโทษ</span>
                          <?php
                          $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as d
                                FROM type AS T 
                                LEFT JOIN em as p on T.t_id=p.types_id
                                GROUP by T.t_id ");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {

                            if ($row['t_id'] == 3) {
                              echo " <span class='info-box-number'>" . $row["d"];
                              "</span>";
                            } ?>
                          <?php } ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box mb-3 bg-purple">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text"> ผู้เข้ารับการตรวจพิสูจน์</span>
                          <?php
                          $select_stmt = $db->prepare("SELECT T.*,COUNT(p.p_id) as d
                                FROM type AS T 
                                LEFT JOIN em as p on T.t_id=p.types_id
                                GROUP by T.t_id ");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {

                            if ($row['t_id'] == 4) {
                              echo " <span class='info-box-number'>" . $row["d"];
                              "</span>";
                            } ?>
                          <?php } ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <!-- tag ปิดประเภทผู้กระทำความผิด -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

              <div class="row">
                <div class="col-md-4">
                  <!-- / ประเภท Acitve -->
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class=" widget-user-header bg-info">
                      <h5 class="text-center font-family">ประเภทผู้กระทำความผิดที่ยัง Active </h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้เข้ารับการตรวจพิสูจน์

                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 4 and st_id=1 ;");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {
                              echo " <span class='float-right badge bg-purple'>" . $row["t"];
                              "</span>";
                            ?>
                            <?php } ?>


                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการพักการลงโทษ

                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 2 and st_id=1 ;");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-success'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการลดการลงโทษ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 3 and st_id=1 ;");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge badge-success'>" . $row["t"];
                              "</span>"  ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ถูกคุมความประพฤติ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 1 and st_id=1 ; ");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-warning'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>

                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผลรวมทั้งหมด
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE st_id = 1;");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              if ($row["st_id"] == 1) {
                                echo " <span class='float-right badge bg-info'>" . $row["t"];
                                "</span>";
                              } ?>
                            <?php } ?>

                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div><!-- tag ปิดประเภท Acitve -->

                <div class="col-md-4">
                  <!-- / ยอดติดตั้งประจำวัน -->
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header badge-success">
                      <h5 class="text-center">ประเภทผู้กระทำความผิดที่มีการติดตั้งวันนี้</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้เข้ารับการตรวจพิสูจน์

                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 4 and em.p_dst = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-purple'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการพักการลงโทษ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 2 and em.p_dst = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-success'>" . $row["t"];
                              "</span>"  ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการลดการลงโทษ

                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 3 and em.p_dst = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge badge-success'>" . $row["t"];
                              "</span>"  ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ถูกคุมความประพฤติ

                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 1 and em.p_dst = curdate(); ");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-warning'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>

                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผลรวมทั้งหมด
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE em.p_dst = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-info'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>

                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div><!-- tag ปิด ยอดติดตั้งประจำวัน -->
                <!-- /.col -->
                <div class="col-md-4">
                  <!-- / ยอดปลดประจำวัน -->
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header badge-danger">
                      <h5 class="text-center">ประเภทผู้กระทำความผิดที่มีการปลดวันนี้</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้เข้ารับการตรวจพิสูจน์
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 4 and st_id=2 and em.p_dsp = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-purple'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการพักการลงโทษ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 2 and st_id=2 and em.p_dsp = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-success'>" . $row["t"];
                              "</span>"  ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ได้รับการลดการลงโทษ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 3 and st_id=2 and em.p_dsp = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge badge-success'>" . $row["t"];
                              "</span>"  ?>
                            <?php } ?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผู้ถูกคุมความประพฤติ
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE type.t_id = 1 and st_id=2 and em.p_dsp = curdate(); ");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-warning'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>

                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white">
                            ผลรวมทั้งหมด
                            <?php
                            $select_stmt = $db->prepare("SELECT t_status.st_id,t_status.st_name,type.t_types,COUNT(*)as t FROM t_status
                            LEFT JOIN em on em.status_id=t_status.st_id
                            LEFT JOIN type on em.types_id=type.t_id
                            WHERE  st_id=2 and em.p_dsp = curdate();");
                            $select_stmt->execute();
                            $result = $select_stmt->fetchAll();
                            foreach ($result as $row) {

                              echo " <span class='float-right badge bg-info'>" . $row["t"];
                              "</span>"; ?>
                            <?php } ?>
                          </a>
                        </li </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div><!-- tag ปิด ยอดปลดประจำวัน -->
              </div>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <!-- / ประเภท Acitve -->
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class=" widget-user-header bg-warning">
                      <h5 class="text-center font-family">ฐานความผิด</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <?php
                          $select_stmt = $db->prepare("SELECT t_offense.of_id,t_offense.of_name,COUNT(*)as t FROM t_offense
                            LEFT JOIN em on em.p_of = t_offense.of_id
                             LEFT JOIN t_status on em.status_id = t_status.st_id
                             WHERE em.p_dst =  curdate()
                             GROUP by t_offense.of_name");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {
                            echo "<a href='#' class='nav-link text-white'>"
                              . $row['of_name'];


                            echo " <span class='float-right badge bg-info'>" . $row["t"];
                            "</span>";
                          ?>
                          <?php } ?>

                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div><!-- tag ปิดประเภท Acitve -->

                <div class="col-md-4">
                  <!-- / ยอดติดตั้งประจำวัน -->
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-indigo">
                      <h5 class="text-center">เงื่อนไขการกระทำความผิด</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <?php
                          $select_stmt = $db->prepare("SELECT t_rule.r_id,t_rule.r_name,COUNT(*)as t FROM t_rule
                            LEFT JOIN em on em.p_rule = t_rule.r_id
                            LEFT JOIN t_status on em.status_id = t_status.st_id
                            WHERE em.p_dst =  curdate()
                            GROUP by t_rule.r_name");
                          $select_stmt->execute();
                          $result = $select_stmt->fetchAll();
                          foreach ($result as $row) {
                            echo "<a href='#' class='nav-link text-white'>"
                              . $row['r_name'];


                            echo " <span class='float-right badge bg-info'>" . $row["t"];
                            "</span>";
                          ?>
                          <?php } ?>

                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div><!-- tag ปิด ยอดติดตั้งประจำวัน -->
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>FORTH 2021 <a href="https://dop.forthtag.com/">EMCC</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
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
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#datatableid').DataTable();
    });
  </script>
</body>

</html>