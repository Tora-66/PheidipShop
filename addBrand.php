<!DOCTYPE html>
<?php
include_once'DBConnect.php';
if(isset($_POST["btnAdd"])):
    $code = $_POST["txtBrandId"];
    $name = $_POST["txtName"];
    $desc = $_POST["txtDesc"];
    if(isset($_FILES['txtPath'])):
        $folder="images/brand_";
        $fileName= $_FILES["txtPath"]["name"];
        $fileTmp= $_FILES["txtPath"]["tmp_name"];
        $path=$folder.$fileName;
        move_uploaded_file($fileTmp, $path);
    endif;
    $query = "insert into tbbrand values('{$code}','{$name}','{$path}','(desc)')";
            $rs =mysqli_query($conn,$query);
            if(!$rs):
                die('nothing to save');
            endif;
            header("location:brand.php");
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
    <title>Add brands</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<caption><h3>New brand ìnormation Form</h3></caption>
        <table width="50%">
            <tr>
                <td>Brand ID: </td>
                <td><input name="txtBrandId" placeholder="Enter Brand Code"></td>
            </tr>
            <tr>
                <td>Brand Name</td>
                <td><input name="txtName" placeholder="Enter Brand Name"></td>
            </tr>
            <tr>
                <td>Logo: </td>
                <td>
                    <input type="file" name="txtPath">
                </td>
            </tr>
            <tr>
                <td>Brand description: </td>
                <td><textarea name="txtDesc" id="description" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td><a href="brand.php">Back to Brand list</a></td>
                <td>
                    <input type="submit" value="Add New" name="btnAdd">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>