<?php
//Lay du lieu
include_once 'php/DBConnect.php';
session_start();

//Lay du lieu tu database
$query = "SELECT *  FROM  tbnews";
$rs    = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs); //mysqli_num_rows: trả về 1 truy vấn được chọn 

include 'php/htmlHead.php';
include 'php/navigationBar.php';
?>

<style>
    .navbar-top {
        border: 1px solid wheat;
        background-color: wheat;
        height: 400px;
    }

    .navbar-top-icon {
        margin: 20px 880px 0px 20px;
    }

    .navbar-top-home {
        margin: 40px 40px 0px 320px;
    }

    .navbar-top-Notify {
        margin: 40px 40px 0px 320px;
    }

    .navbar-top-Notify h1 {
        font-size: 40px;
        font-family: "Helvetica Neue", Helvetica, sans-serif;
        text-transform: none;
        font-style: normal;
        color: white;
    }

    .navbar-top-time {
        font-size: large;
        color: burlywood;
        margin: 20px 850px 0px 30px;
        font-size: 20px;
        font-family: "Helvetica Neue", Helvetica, sans-serif;
    }

    .navbar-title {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
    }

    .navbar-image {
        padding-left: 100px;
        padding-right: 200px;
    }

    .navbar-commnet {
        padding-left: 100px;
        padding-right: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
    }
</style>

<head>

<body>
    <!-- Backround - top -->
    <div class="navbar-top">
        <div class="navbar-top-icon">
            <a href=""><img src="img/source/Logo.png" alt=""></a>
        </div>

        <div class="navbar-top-home">
            <button type="button" class="btn btn-light"><a href="#.php" class="text-decoration-none text-warning">Home Pate</a></button>
        </div>

        <div class="navbar-top-Notify">
            <h1>Philip Shop would like to introduce Information about some new SHOE MODELS on the market today</h1>
        </div>

        <div class="navbar-top-time">
            <?php
            $today = date("d/m/Y");
            echo $today;
            ?>
        </div>
    </div>

    <!-- News -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 container">
        <!-- Mo du lieu -->
        <?php
        if ($count == 0) :
            echo 'Record not found!';
        else :
            while ($data = mysqli_fetch_array($rs)) :
        ?>
                <!-- Code Html -->
                <div class="navbar">
                    <div class="navbar-title">
                        <p><?= $data[1] ?></p>
                    </div>
                    <br>
                    <div class="navbar-image">
                        <img src="<?= $data[3] ?>" alt="Image" height="600" width="600">
                    </div>

                    <div class="navbar-commnet">
                        <p><?= $data[2] ?></p>
                    </div>
                </div>
                <!-- Dong du lieu -->
        <?php
            endwhile;

        endif;
        mysqli_close($conn);
        ?>
    </div>
</body>
</head>

<?php
include 'php/footer.php';
include 'php/htmlBody.php';
?>