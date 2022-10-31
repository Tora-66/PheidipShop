<?php
include_once 'php/DBConnect.php';


include 'php/htmlHead.php';
include 'php/sidebar.php';
?>


<?php
include 'php/htmlBody.php';
mysqli_close($conn);
?>