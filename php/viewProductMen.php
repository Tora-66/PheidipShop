<?php

$code = $_GET["id"];
$query = "SELECT * FROM tbProduct WHERE BrandID = {$code};";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);

$query1 = "SELECT * FROM tbbrand ";
$rs1 = mysqli_query($conn, $query1);
$count1 = mysqli_num_rows($rs1);
$brand = array();
for ($i = 0; $i < $count1; $i++) {
    $rc1 = mysqli_fetch_array($rs1);
    array_push($brand, $rc1);
}

$query2 = "SELECT * FROM tbtype ";
$rs2 = mysqli_query($conn, $query2);
$count2 = mysqli_num_rows($rs2);
$type = array();
for ($i = 0; $i < $count2; $i++) {
    $rc2 = mysqli_fetch_array($rs2);
    array_push($type, $rc2);
}

echo '
<section class="pt-5 text-center">
    <div class="container">
        <div class="row">';
while ($data1 = mysqli_fetch_array($rs)) :
    echo '
                    <div class="col-3 d-flex justify-content-center mb-4">
                        <div class="card me-2">
                            <img src="'.$data1[3].'" class="card-img-top" alt="...">
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="card-title">'.$data1[1].'</h5>
                                <p class="card-text mb-0 mt-auto">$'.$data1[2].'</p>
                                <a href="../detailsProduct.php?id='.$data1[0].'" class="btn btn-primary rounded-pill mx-4 mt-auto mb-0">
                                    <i class="bi bi-cart-plus me-2"></i>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>';
endwhile;
echo '
</div>
</div>
</section>
';
