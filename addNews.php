<!DOCTYPE html>
<?php
include_once 'php/DBConnect.php';
session_start();

if (isset($_POST["btnAdd"])) :
    $desc = $_POST["txtDesc"];  //Hình ảnh
    $title = $_POST["txttitle"]; //Tên hình ảnh
    if (isset($_FILES['txtPath'])) :
        $folder = "img/news_";
        //Kiem tra du lieu xem co hop le hay khong
        $fileName = $_FILES["txtPath"]["name"];
        $fileTmp = $_FILES["txtPath"]["tmp_name"];  //tmp_name: Đường đẫn của hình
        $path = $folder . $fileName; //Tên Hình ảnh khi chạy vào bên trong database
        move_uploaded_file($fileTmp, $path); // Uploađe hình ảnh lên code
    endif;
    $query = "INSERT INTO `tbNews` (`Title`, `Content`, `Image`, `NewsDate`) VALUES ('{$title}', '{$desc}' ,'{$path}', now())";
    $rs = mysqli_query($conn, $query);
    if (!$rs) :
        die('nothing to save');
    endif;
    header("location:ViewsNews.php");
endif;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Add brands</title>
</head>

<body>

    <form method="post" enctype="multipart/form-data">
        <caption>
            <h4>News Management/Add News </h4>
        </caption>

        <table class="table table-hove table-bordered">
            <tr>
                <td>Title:</td>
                <td>
                    <form class="form-floating">
                        <input type="text" class="form-control is-invalid" id="floatingInputInvalid" placeholder="Input Image" name="txttitle">
                        <label for="floatingInputInvalid">Name Image</label>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Image: </td>
                <td>
                    <input type="file" name="txtPath">
                </td>
            </tr>
            <tr>
                <td>Notification:</td>
                <td>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="txtDesc" rows="10" cols="30"></textarea>
                        <label for="floatingInputInvalid">Notification</label>
                    </div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Add New" name="btnAdd">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>



