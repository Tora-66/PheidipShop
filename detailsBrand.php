<?php
include_once 'php/DBConnect.php';
session_start();

$pageTitle = "Details Brand";

$code = $_GET["code"];
$query = "SELECT * FROM tbbrand where BrandID = '{$code}'";
$rs = mysqli_query($conn, $query);
$field = mysqli_fetch_array($rs);
$count = mysqli_num_rows($rs);

include 'php/htmlHead.php';
include 'php/sidebar.php';
?>
<caption>
    <h2><?= $field[1] ?> Detials</h2>
</caption>
<table class="table table-hove table-bordered"" width=" 50%">

    <tr>
        <td rowspan="2"><img src="./<?= $field[2] ?>" alt="Image" width="100px" height="100px"></td>
        <td>Brand ID: </td>
        <td><?= $field[0] ?> </td>
    </tr>
    <tr>
        <td>name:</td>
        <td><?= $field[1] ?></td>
    </tr>
    <tr>
        <td colspan="3">description:</td>
    </tr>
    <tr>
        <td colspan="3"><?= $field[3] ?></td>
    </tr>
    <tr>
        <td align="center" colspan="3">
            <a href="brand.php">Back to brand list</a> ||
            <a href="editBrand.php?code=<?= $field[0] ?>">Update</a>
        </td>
    </tr>
</Table>

<?php
mysqli_close($conn);
include 'php/htmlBody.php';
?>