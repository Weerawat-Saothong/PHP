<?php
include '../connection.php';
$connect = mysqli_connect("localhost","root","","emcc");
 $output ='';
 if(isset($_POST['export_excel'])){
     $sql = " SELECT * FROM em
     LEFT JOIN t_agency on t_agency.g_id = em.agency_id
     LEFT JOIN t_status on t_status.st_id = em.status_id
     left JOIN type on type.t_id = em.types_id
     where status_id = 1
      ORDER BY p_id DESC";
     $result = mysqli_query($connect, $sql);
     if(mysqli_num_rows($result) > 0 ){
         $output .= '
         <table class="table " bordered="1">
         <tr>
                <th>วันที่ติดตั้ง</th>
                <th>วันที่ปลด</th>
                <th>ชื่อ-สกุล</th>
                <th>เลขบัตรประชาชน</th>
                <th>สำนักงาน</th>
                <th>หมายเลข EM</th>
                <th>ประเภทผู้กระทำความผิด</th>
                <th>สถานะ</th>
            </tr>
                
                ';
      while($row = mysqli_fetch_array($result)){
          $output .= '
           <tr>
           <td>'.$row["p_dst"].'</td>
           <td>'.$row["p_dsp"].'</td>
           <td>'.$row["p_name"].'</td>
           <td>'.$row["id_card"].'</td>
           <td>'.$row["g_name"].'</td>
           <td>'.$row["p_em"].'</td>
           <td>'.$row["t_types"].'</td>
           <td>'.$row["st_name"].'</td>
           <tr>
 
          ';
      }
      $output .= '</table>'; 
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment;filename=download.xls"); 
     }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOTAL</title>
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
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="b.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header clearfix">
                    <div class="display-4 text-center md-1">ACTIVE</div>
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


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select_stmt = $db->prepare("SELECT * FROM `em`
                                                LEFT JOIN t_agency on t_agency.g_id = em.agency_id
                                                LEFT JOIN t_status on t_status.st_id = em.status_id
                                                left JOIN type on type.t_id = em.types_id
                                                where status_id = 1");
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

        <form action="total.php" method="post">
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-4">
                    <button type="submit" name="export_excel" class="btn btn-primary" value="Download"><i class="fa fa-download"></i> Download</button>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <a href="../Dashboard.php" class="btn btn-danger">Cancel</a>
                </div>

            </div>
        </form>
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