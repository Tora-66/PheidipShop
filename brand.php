<!DOCTYPE html>
<?php 
    include_once 'DBConnect.php';
    $query = "select * from tbbrand";
    $rs    = mysqli_query($conn, $query);
    $count = mysqli_num_rows($rs);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>brand</title>
</head>
<body>
<div class="container">
        <h2 >Brand List</h2>
        <a href="addBrand.php">ADD NEW BRAND</a>
        <table class="table table-hove table-bordered">
            <tr>
                <th>Brand ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th colspan="2">Function</th>
            </tr>
            <?php 
            if($count == 0):
                echo 'Record not found!';
            else:
                while( $data= mysqli_fetch_array($rs) ):

            ?>
            <tr>
                <td><?= $data[0]?></td>
                <td><?= $data[1]?></td>
                <td style="text-align:center"><img src="<?= $data[2]?>" alt="Image" width="40" height="30"></td>
                <td><a href="editBrand.php?code=<?= $data[0]?>">Update</a></td>
                <td><a href="detailsBrand.php?code=<?= $field[0]?>">Details</a></td>
            </tr>
            <?php 
        endwhile;
    endif;
    mysqli_close($conn);
        ?>
        </table>
       
    </div>
</body>
</html>