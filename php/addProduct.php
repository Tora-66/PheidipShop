<!DOCTYPE html>
<?php
include_once'DBConnect.php';
    $query1 = "SELECT * FROM tbbrand ";
    $rs1 = mysqli_query($conn,$query1);
    $count1=mysqli_num_rows($rs1);
    
    $query2 = "SELECT * FROM tbtype ";
    $rs2 = mysqli_query($conn,$query2);
    $count2=mysqli_num_rows($rs2);

    //add
    if(isset($_POST["btnAdd"])):
        #1.Process Image Value
            $proId = $_POST["txtProId"];
            $name = $_POST["txtName"];
            $price = $_POST["txtPrice"];
            $brandId = $_POST["brand"];
            $typeId = $_POST["type"];
            $desc = $_POST["txtDesc"];

            //thumnail
            if(isset($_FILES['txtThumbnail'])):
                $folder1 ="images/thumbnail_";
                $fileName1= $_FILES["txtThumbnail"]["name"];
                $fileTmp1= $_FILES["txtThumbnail"]["tmp_name"];
                $thumbnail=$folder1.$fileName1;
                move_uploaded_file($fileTmp1, $thumbnail);
            endif;

            //image
            if(isset($_FILES['txtImage'])):
                $folder2 ="images/image_";
                $fileName2= $_FILES["txtImage"]["name"];
                $fileTmp2= $_FILES["txtImage"]["tmp_name"];
                $image=$folder2.$fileName2;
                move_uploaded_file($fileTmp2, $image);
            endif;

            //SQL
            $query = "insert into tbproduct values('{$proId}','{$name}','{$price}','{$thumbnail}','{$image}','{$brandId}','{$typeId}','{$desc}')";
            $rs =mysqli_query($conn,$query);
            if(!$rs):
                die('nothing to save');
            endif;
            header("location:product.php");
    endif;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Add Product</title>
</head>
<body>
    
    <div class="container">
        <form method="post"  enctype="multipart/form-data">
        <caption><h2>Add New Product</h2></caption>
        <a href="product.php">Back to product list</a>
            <table width="50%" class="table table-borderless">
                <tr>
                    <td>Product ID: </td>
                    <td><input name="txtProId" placeholder="Enter ID: PPxx"></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input name="txtName" placeholder="Enter Name"></td>
                </tr>
                <tr>
                    <td>Price : </td>
                    <td><input name="txtPrice" placeholder="Enter price"></td>
                </tr>
                <tr>
                    <td>thumbnail: </td>
                    <td><input type="file" name="txtThumbnail"></td>
                </tr>
                <tr>
                    <td>Image: </td>
                    <td><input type="file" name="txtImage"></td>
                </tr>
                <tr>
                    <td>Brand: </td>
                    <td><select name="brand" id="brands">
                    <?php while($field = mysqli_fetch_array($rs1)): ?>

                        <option value="./<?= $field[0]?>"><?= $field[1]?></option>

                    <?php endwhile; ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td><select name="type" id="type">
                    <?php while($field = mysqli_fetch_array($rs2)): ?>

                        <option value="./<?= $field[0]?>"><?= $field[1]?></option>

                    <?php endwhile; ?>
                    </select></td>
                </tr>
                <tr>
                    <td>description: </td>
                    <td><textarea name="txtDesc" id="desc" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnAdd" value="Add New" 
                    onclick="return confirm('Ready to add new product ')"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>