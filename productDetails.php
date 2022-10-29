<!DOCTYPE html>
<?php
session_start();

//Connect database
include_once 'DBConnect.php';


$proID = $_GET["id"];

$queryProduct = "SELECT * FROM `tbProduct` WHERE ProductID = '{$proID}'";
$rsProduct = mysqli_query($conn, $queryProduct);
$countProduct = mysqli_num_rows($rsProduct);
$rcProduct = mysqli_fetch_array($rsProduct);

if (isset($_POST['btnAdd'])) {
  $size = $_POST['options'];
  $quantity = $_POST['quantity'];

  array_push($_SESSION["prodID"], $proID);
  array_push($_SESSION["size"], $size);
  array_push($_SESSION["quantity"], $quantity);
}


?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>

<body>
  <div class="container">
    <div class="page-header">
      <span class="login-signup"><a href="Cart.php">Cart</a></span>
    </div>
  </div>
  <form method="post">
    <div class="card m-2" style="width: 18rem">
      <img src="img/1.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title"><?= $rcProduct[1] ?></h5>
        <p class="card-text mx-auto"><?= $rcProduct[5] ?></p>
        <div class="container">
          <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" value="38" />
          <label class="btn btn-secondary" for="option1">38</label>
        </div>
        <div class="container">
          <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" value="39" />
          <label class="btn btn-secondary" for="option2">39</label>
        </div>
        <div class="container">
          <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" value="40" />
          <label class="btn btn-secondary" for="option3">40</label>
        </div>
        <div class="container">
          <input type="number" name="quantity">
        </div>
        <button type="submit" class="btn btn-dark btn-lg rounded-0 card-button" name="btnAdd">
          <i class="bi bi-cart2 me-2"></i> Add to cart
        </button>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <?php mysqli_close($conn); ?>
</body>

</html>