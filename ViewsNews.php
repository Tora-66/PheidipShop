<?php
include_once 'php/DBConnect.php';
session_start();

$pageTitle = "News Management";

$query = "SELECT *  FROM  tbnews";
$rs    = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs); //mysqli_num_rows: trả về 1 truy vấn được chọn 

include 'php/htmlHead.php';
include 'php/sidebar.php';
?>
<div class="container">
    <table class="table">

        <h2>News Manguage</h2>

        <a href="AddNews.php">Add New</a>

        <thead>
            <tr>
                <th scope="col">NewsId</th>
                <th scope="col">Title</th>
                <th scope="col">Comment</th>
                <th scope="col">Image</th>
                <th scope="col">DateTime</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($count == 0) :
                echo 'Record not found!';
            else :
                while ($data = mysqli_fetch_array($rs)) :
            ?>
                    <tr>
                        <td><?= $data[0] ?></td>
                        <td><?= $data[1] ?></td>
                        <td><?= $data[2] ?></td>
                        <td style="text-align:center"><img src="<?= $data[3] ?>" alt="Image" width="40" height="30"></td>
                        <td><?= $data[4] ?></td>
                        <td><a href="#?code=<?= $data[0] ?>">Update</a></td>
                        <td><a href="DetailsFeedBack.php?code=<?= $field[0] ?>">Details</a></td>
                    </tr>
            <?php
                endwhile;

            endif;
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<?php
include 'php/htmlBody.php';
?>