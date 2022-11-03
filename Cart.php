<?php
session_start();
include_once 'php/DBConnect.php';

$pageTitle = "Shopping Cart";

if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
  session_write_close();
} else {
  session_unset();
  session_write_close();
  $url = "./home.php";
  header("Location: $url");
}

$query = "SELECT * FROM `tbBrand`;";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);
$brand = array();
for ($i = 0; $i < $count; $i++) {
  $rc = mysqli_fetch_array($rs);
  array_push($brand, $rc);
}


$checkout = "";
$count = count($_SESSION["prodID"]);
if($count == 0){
  $checkout = "disabled";
}

function total($price, $quantity)
{
  echo $price * $quantity;
}

$queryInventory = "SELECT `ProductID`, `Size`, `Quantity` FROM `tbInventory`";
$rsInventory = mysqli_query($conn, $queryInventory);
$countInventory = mysqli_num_rows($rsInventory);
$inventory = array();
for ($i = 0; $i < $countInventory; $i++) {
  $rcInventory = mysqli_fetch_array($rsInventory);
  array_push($inventory, $rcInventory);
}

include 'php/htmlHead.php';
include 'php/navigationBar.php';
?>
<section id="cartView" class="section-margin cart">
  <form method="post">
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
      <?php
      for ($i = 0; $i < $count; $i++) :
        $prodID = $_SESSION["prodID"][$i];
        $size = $_SESSION["size"][$i];
        $quantity = $_SESSION["quantity"][$i];

        $queryProduct = "SELECT * FROM `tbProduct` WHERE ProductID = '{$prodID}'";
        $rsProduct = mysqli_query($conn, $queryProduct);
        $rcProduct = mysqli_fetch_array($rsProduct);
      ?>
        <tbody>
          <tr class="text-center align-middle">
            <th scope="row"><?= $i + 1; ?></th>
            <td>
              <div class="product-card">
                <img src="<?= $rcProduct[3]; ?>" alt="" class="product-card-item product-card-img">
                <div class="product-card-item">
                  <h5><a href="productDetails.php?id=<?= $prodID; ?>"><?= $rcProduct[1]; ?></a></h5>
                  <p><?php
                      for ($x = 0; $x < count($brand); $x++) {
                        if ($rcProduct[5] == $brand[$x][0]) {
                          echo $brand[$x][1];
                        }
                      };

                      ?></p>
                  <p><?= $size; ?></p>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex justify-content-center">
                <?php
                $minus = "";
                $add = "";
                for ($z = 0; $z < count($inventory); $z++) :
                  if ($inventory[$z][0] == $prodID && $inventory[$z][1] == $size) :
                    if ($quantity <= 1) :
                      $minus = "disabled";
                    endif;
                ?>
                    <a class="btn btn-outline-dark <?= $minus; ?>" href="php/minus.php?index=<?= $i; ?>">-</a>
                    <p id="quantity" class="m-2"><?= $quantity; ?></p>
                    <?php
                    if ($quantity >= $inventory[$z][2]) :
                      $add = "disabled";
                    endif;
                    ?>
                    <a class="btn btn-outline-dark <?= $add; ?>" href="php/add.php?index=<?= $i; ?>">+</a>
                <?php
                  endif;
                endfor;
                ?>
              </div>
            </td>
            <td>$<span id="price"><?= $rcProduct[2]; ?></span></td>
            <td>
              <p id="total">$<?= total((float)$rcProduct[2], (int)$quantity); ?></p>
            </td>
            <td><a class="btn btn-outline-warning" href="php/remove.php?index=<?= $i; ?>">Remove</a></td>
          </tr>
        </tbody>
      <?php
      endfor;
      ?>
    </table>
    <div class="m-2 me-5 pe-3 text-end">
      <a class="btn btn-danger <?= $checkout;?>" href="checkout.php">Checkout</a>
    </div>
  </form>
</section>


<?php mysqli_close($conn);
include 'php/htmlBody.php';
?>