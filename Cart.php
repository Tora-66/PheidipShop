<!DOCTYPE html>
<?php
session_start();

include_once 'dbConnect.php';

if (!isset($_SESSION["userID"])) :
  header("location: home.php");
endif;





?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card {
      display: flex;
    }

    .product-card-item {
      margin-right: 0.5rem;
    }

    .product-card-img {
      width: 7rem;
    }

    .quantity {
      width: 3rem;
    }

    .table thead th {
      font-size: large;

    }
  </style>
</head>
<body>
  <!-- Form table -->
  <table class="table">
    <thead>
      <tr class="text-center">
        <th scope="col"></th>
        <th scope="col">Product</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center align-middle">
        <th scope="row">1</th>
        <td>
          <div class="product-card">
            <img src="../img/1.jpg" alt="" class="product-card-item product-card-img">
            <div class="product-card-item">
              <h5>Name of Product</h5>
              <p>Brand</p>
            </div>
          </div>
        </td>
        <td>
          <input type="number" class="quantity">
        </td>
        <td>$99.00</td>
        <td>
          <p id="total"></p>
        </td>
        <td><a href="">Remove</a></td>
      </tr>
    </tbody>
  </table>
</body>

</html>