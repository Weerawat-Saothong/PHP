<?php 
 $connect = mysqli_connect("localhost","root","","emcc");
 $output ='';
 if(isset($_POST['export_excel'])){
     $sql = " SELECT * FROM em
     LEFT JOIN t_agency on t_agency.g_id = em.agency_id
     LEFT JOIN t_status on t_status.st_id = em.status_id
     left JOIN type on type.t_id = em.types_id
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