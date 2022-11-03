<!DOCTYPE html>
<html lang="en">
    <?php
        //Ket noi du lieu
        include_once 'php/DBConnect.php';

        if (isset($_POST["txtSubmit"])):
            $name = $_POST["txtName"];
            $phone = $_POST["txtPhone"];
            $email = $_POST["txtEmail"];
            $Content = htmlspecialchars($_POST["txtContent"]);   

            $tbguest = "INSERT INTO tbguest (GuestName, email, phone) VALUE ('{$name}','{$email}', '{$phone}')";
            $rstbguest = mysqli_query($conn, $tbguest);

            $guest = "SELECT GuestID FROM tbguest WHERE `email` = '{$email}'";
            $rsguest = mysqli_query($conn, $guest);
            $rcguest = mysqli_fetch_array($rsguest);

            $tbfeedback = "INSERT INTO tbfeedback (`GuestID` ,`Content`, `Date`) VALUE ('{$rcguest[0]}', '{$Content}',now())";
            $rstbfeedback =mysqli_query($conn,$tbfeedback);

            if(!$rstbguest && !$rstbfeedback):
                die('nothing to save'); 
            endif;
            header("location: home.php");
        endif;

        //
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
                <input type="text" name = "txtName">
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>
                <input type="text" name = "txtPhone">
            </td>
        </tr>
        <tr>
            <td>Mail:</td>
            <td>
                <input type="text" name = "txtEmail">
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
            <td> <input type="submit" name = "txtSubmit" value="Send" ></td>
        </tr>

    </table>
</form>
</body>
</html>