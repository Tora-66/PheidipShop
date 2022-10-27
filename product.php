<?php 
    ##1. Connect to databse
    include_once'./DBConnect.php';
    $query="SELECT * FROM tbproduct";
    $rs=mysqli_query($conn,$query);
    $count=mysqli_num_rows($rs);

    $query1="SELECT * FROM tbbrand ";
    $rs1=mysqli_query($conn,$query1);
    $count1=mysqli_num_rows($rs1);

    $query2="SELECT * FROM tbtype ";
    $rs2=mysqli_query($conn,$query2);
    $count2=mysqli_num_rows($rs2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Product List</title>
</head>
<body>
<h2 >Product List</h2>
        <a href="addProduct.php">ADD NEW BRAND</a>
        <table class="table table-hove table-bordered">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>price</th>
                <th>Thumbnail</th>
                <th>Brand</th>
                <th>Type</th>
                <th colspan="2">Function</th>
            </tr>
            <?php 
            if($count == 0):
                echo '<br>Record not found!';
            else:
                while($data1= mysqli_fetch_array($rs)):
            ?>
                    <tr>
                        <td><?= $data1[0]?></td>
                        <td><?= $data1[1]?></td>
                        <td> $ <?= $data1[2]?></td>
                        <td style="text-align:center"><img src="<?= $data1[3]?>" alt="Image" width="40" height="30"></td>
                        <td>
                            <?php
                                while($data2= mysqli_fetch_array($rs1)):
                                    if($data1[5]==$data2[0]){
                                        echo $data2[1];}
                                endwhile;
                            ?>
                        </td>
                        <td>
                            <?php
                                while($data3= mysqli_fetch_array($rs2)):
                                    if($data1[6]==$data3[0]):
                                        echo $data3[1];
                                    endif;
                                endwhile;
                            ?>
                        </td>
                        <td><a href="#?id=<?= $data1[0]?>">Update</a></td>
                        <td><a href="detailsProduct.php?id=<?= $data1[0]?>">Details</a></td>
                    </tr>
                    <?php 
                endwhile;
            endif;
            mysqli_close($conn);
            ?>
        </table>
</body>
</html>