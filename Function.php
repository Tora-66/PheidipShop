<?php
//Start Session
session_start();

//Connect database
include_once 'dbConnect.php';
mysqli_close($conn);

// Check user session
if(!isset($_SESSION["userID"])):
    header("location: home.php");
  endif;

// Execute sql query
$query = "";
$rs = mysqli_query($conn, $query);
$detailsRecord = mysqli_fetch_array($rs);
mysqli_close($conn);

//Start Shopping Session
if (!isset($_SESSION["prodID"])) :
    $_SESSION["prodID"] = array();
    $_SESSION["size"] = array();
    $_SESSION["quantity"] = array();
endif;


// Add to cart
if (isset($_POST["btnAdd"])) :
    if (isset($_SESSION["userID"])) :
        array_push($_SESSION["prodID"], $productID);
        array_push($_SESSION["size"], $size);
        array_push($_SESSION["quantity"], $quantity);
    else :
        header("location: Login.php");
    endif;
endif;

// Remove Item
// if (isset($_POST["btnRemove"])) :
//     $index = 0; //return index in here
//     $_SESSION["prodID"] = array_diff($_SESSION["prodID"], $_SESSION["prodID"][$index]);
//     $_SESSION["size"] = array_diff($_SESSION["size"], $_SESSION["size"][$index]);
//     $_SESSION["quantity"] = array_diff($_SESSION["quantity"], $_SESSION["quantity"][$index]);
// endif;

//Empty Cart
if (isset($_POST['btnEmtpy'])) :
    unset($_SESSION["prodID"]);
    unset($_SESSION["size"]);
    unset($_SESSION["quantity"]);
endif;

// Add inventory
$quantity = $_POST["quantity"];
$productID = $_POST["prodID"];
$size = $_POST["size"];

$query = "UPDATE `tbInventory`
SET `Quantity` = `Quantity` + {$quantity}
WHERE `ProductID` = '{$productID}' AND `Size` = '{$size}';";
$rs = mysqli_query($conn, $query);

header("location: inventory.php");
