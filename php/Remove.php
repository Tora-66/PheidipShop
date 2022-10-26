<?php
session_start();

if (!isset($_GET["index"])) :
    header("Location: Cart.php");
endif;

$index = $_GET["index"];

$_SESSION["prodID"] = array_diff($_SESSION["prodID"], $_SESSION["prodID"][$index]);
$_SESSION["size"] = array_diff($_SESSION["size"], $_SESSION["size"][$index]);
$_SESSION["quantity"] = array_diff($_SESSION["quantity"], $_SESSION["quantity"][$index]);

header("Location: Cart.php");
