<?php
//Ket noi du lieu
include_once 'php/DBConnect.php';
session_start();

$pageTitle = "News Details";

//Detials 
$code = $_GET["code"];
$query = "SELECT * FROM tbnews WHERE NewsID = '{$code}'";
$rs = mysqli_query($conn, $query);
$news = mysqli_fetch_array($rs);

include 'php/htmlHead.php';
include 'php/sidebar.php';
?>
<div class="DetailsNews">
    <h2>Details News</h2>

    <h4><a href="ViewsNews.php">Back to News</a></h4>
</div>
<div class="navbar">
    <!-- Table News Details  -->
    <div class="navbar-table">
        <form action="" method="post">
            <table class="table table-hove table-bordered">
                <tr>
                    <td>News ID:</td>
                    <td><input name="" value="<?= $news[0] ?>" readonly></td>
                </tr>

                <tr>
                    <td>Title:</td>
                    <td><input name="" value="<?= $news[1] ?>" readonly></td>
                </tr>

                <tr>
                    <td>Comment:</td>
                    <td><input name="" value="<?= $news[2] ?> " readonly></td>
                </tr>

                <tr>
                    <td>Image:</td>
                    <td style="text-align:center"><img src="<?= $news[3] ?>" alt="Image" width="40" height="30" aria-readonly="" name=""></td>
                </tr>

                <tr>
                    <td>Date Time:</td>
                    <td> <input name="" value="<?= $news[4] ?>" readonly></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include 'php/htmlBody.php';
?>