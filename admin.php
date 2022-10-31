<?php
include_once 'DBConnect.php';


include 'php/htmlHead.php';
include 'sidebar.php';
?>


<?php
include 'php/htmlBody.php';
mysqli_close($conn);
?>