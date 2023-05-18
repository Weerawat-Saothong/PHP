<?php 
    require_once('connection.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare("SELECT * FROM tbl_person WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM tbl_person WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

    <div class="container">
    <<div class="display-3 text-center">Information</div>
    <a href="add.php" class="btn btn-success mb-3">Add+</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
            <th>start date </th>
                <th>end date</th>
                <th>sex</th>
                <th>name</th>
                <th>ID_card</th>
                <th>agency</th>
                <th>EM_ID</th>
                <th>offense</th>
                <th>condition</th>
                <th>surveillance</th>
                <th>offender type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $select_stmt = $db->prepare("SELECT * FROM tbl_person");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <tr>
                    <td> <?php echo $row["date_st"]; ?></td>
                    <td> <?php echo $row["date_sp"]; ?></td>
                    <td> <?php echo $row["sex"];     ?></td>
                    <td> <?php echo $row["name"];    ?></td>
                    <td> <?php echo $row["id_card"]; ?></td>
                    <td> <?php echo $row["agency"];  ?></td>
                    <td> <?php echo $row["id_em"];   ?></td>
                    <td> <?php echo $row["ofense"];  ?></td>
                    <td> <?php echo $row["condt"];   ?></td>
                    <td> <?php echo $row["svl"];     ?></td>
                    <td> <?php echo $row["type"];    ?></td>
                    <td><a href="edit.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-warning">Edit</a></td>
                    <td><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
    </div>
    
    

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>



