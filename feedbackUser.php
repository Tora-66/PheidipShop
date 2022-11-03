<!DOCTYPE html>
<html lang="en">
<?php
//Ket noi du lieu
session_start();
include_once 'php/DBConnect.php';

// Get User ID
$queryId = "SELECT `UserID`  FROM tbUser_Account WHERE UserName = '{$_SESSION["username"]}';";
$rsId = mysqli_query($conn, $queryId);
$rc = mysqli_fetch_array($rsId);
$userID = $rc[0];


//Lay du lieu TbUser_Acount
$tbuser_accont = "SELECT * FROM tbuser_account WHERE UserID ='{$userID}'";
$rs = mysqli_query($conn, $tbuser_accont);
$data = mysqli_fetch_array($rs);

//Lay du lieu tbFeedBack
$tbfeedback = "SELECT * FROM tbfeedback";
$rs2 = mysqli_query($conn, $tbfeedback);
$data2 = mysqli_fetch_array($rs2);

//Sever
if (isset($_POST["txtSubmit"])) :
    $Content = htmlspecialchars($_POST["txtContent"]);

    $query = "INSERT INTO tbfeedback (`UserID` ,`Content`, `Date`) VALUES ('{$userID}','{$Content}',now());";
    $rs3 = mysqli_query($conn, $query);

    if (!$rs2) :
        die('nothing to save');
    endif;
    header("location: home.php");
endif;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <h2>Input FeedBack</h2>
        <table class="table table-hove table-bordered">
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="txtName" value="<?= $data[0] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>
                    <input type="text" name="txtPhone" value="<?= $data[1] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Mail:</td>
                <td>
                    <input type="text" name="txtEmail" value="<?= $data[3] ?>" readonly>
                </td>
            </tr>

            <tr>
                <td>FeedBack:</td>
                <td>
                    <textarea id="subject" name="txtContent" placeholder="Write something.." style="height:200px"></textarea>
                </td>
            </tr>

            <tr>
                <td></td>
                <td> <input type="submit" name="txtSubmit" value="Send"></td>
            </tr>

        </table>
    </form>
</body>

</html>