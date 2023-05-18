<?php
    $con  = mysqli_connect("localhost","root","","emcc");
     if (!$con) {
         # code...
        echo "Problem in database connection! Contact administrator!";
     } else {
             $sql ="SELECT em.types_id , type.t_types,count(*) as tatel FROM em
			 LEFT JOIN type on type.t_id=em.types_id GROUP BY em.types_id";
             $result = mysqli_query($con,$sql);
             $chart_data="";
             while ($row = mysqli_fetch_array($result)) { 
     
                $types[]  = $row['t_types'];
                $cou[] = $row['tatel'];
            }
     
     
     }
     
     
    ?>