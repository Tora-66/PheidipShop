<!DOCTYPE html>
<?php

include_once 'DBConnect.php';

$queryInventory = "SELECT * FROM `tbInventory`";
$rsInventory = mysqli_query($conn, $queryInventory);
$countInventory = mysqli_num_rows($rsInventory);


$queryProduct = "SELECT * FROM `tbProduct`";
$rsProduct = mysqli_query($conn, $queryProduct);
$countProduct = mysqli_num_rows($rsProduct);

$proInven = array();
// ProID array in Inventory
for ($i = 0; $i < $countInventory; $i++) :
  $rcInventory = mysqli_fetch_array($rsInventory);
  array_push($proInven, $rcInventory[1]);
endfor;
array_unique($proInven);

for ($x = 0; $x < $countProduct; $x++) :
  $rcProduct = mysqli_fetch_array(($rsProduct));
  if (!in_array($rcProduct[0], $proInven)) {
    $InvenID = $rcProduct[0] . "38";
    $queryInsert = "INSERT INTO `tbInventory`(InventoryID, ProductID, `Size`, Quantity) VALUES
          ('{$InvenID}', '{$rcProduct[0]}', '38', 0);";
    $executeInsert = mysqli_query($conn, $queryInsert);

    $InvenID = $rcProduct[0] . "39";
    $queryInsert = "INSERT INTO `tbInventory`(InventoryID, ProductID, `Size`, Quantity) VALUES
          ('{$InvenID}', '{$rcProduct[0]}', '39', 0);";
    $executeInsert = mysqli_query($conn, $queryInsert);

    $InvenID = $rcProduct[0] . "40";
    $queryInsert = "INSERT INTO `tbInventory`(InventoryID, ProductID, `Size`, Quantity) VALUES
          ('{$InvenID}', '{$rcProduct[0]}', '40', 0);";
    $executeInsert = mysqli_query($conn, $queryInsert);

    $InvenID = $rcProduct[0] . "41";
    $queryInsert = "INSERT INTO `tbInventory`(InventoryID, ProductID, `Size`, Quantity) VALUES
          ('{$InvenID}', '{$rcProduct[0]}', '41', 0);";
    $executeInsert = mysqli_query($conn, $queryInsert);

    $InvenID = $rcProduct[0] . "42";
    $queryInsert = "INSERT INTO `tbInventory`(InventoryID, ProductID, `Size`, Quantity) VALUES
          ('{$InvenID}', '{$rcProduct[0]}', '42', 0);";
    $executeInsert = mysqli_query($conn, $queryInsert);
  }
endfor;

$queryInventory = "SELECT * FROM `tbInventory`";
$rsInventory = mysqli_query($conn, $queryInventory);

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <h2>Product List</h2>
  <a href="addProduct.php" class="text-dark">ADD NEW BRAND</a>
  <table class="table table-hove table-bordered text-center">
    <tr>
      <th>Inventory ID</th>
      <th>Product</th>
      <th>Size</th>
      <th>Quantity</th>
      <th colspan="2">Add</th>
    </tr>
    <?php
    while ($rcInventory = mysqli_fetch_array($rsInventory)) :
    ?>
      <tr>
        <td><?= $rcInventory[0]; ?></td>
        <td><?= $rcInventory[1]; ?></td>
        <td><?= $rcInventory[2]; ?></td>
        <td><?= $rcInventory[3]; ?></td>
        <td><a href="addInventory.php?id='<?= $rcInventory[0]; ?>'">Add</a></td>
      </tr>
    <?php
    endwhile;
    ?>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <?php
  mysqli_close($conn);
  ?>

</body>

</html>