<?php
#1.connect to database
include_once 'php/DBConnect.php';
session_start();

$pageTitle = "Update News";

if (!isset($_GET["code"])) :
    header("Location: ViewsNews.php");
endif;

#2. Access data by code
$code = $_GET["code"];
$query = "SELECT * FROM tbnews WHERE NewsID = '{$code}'";
$rs = mysqli_query($conn, $query);
$data = mysqli_fetch_array($rs);

#3. Updata data to database
if (isset($_POST["txtSubmit"])) :
    $newsid = $_POST["txtNewsid"];
    $title = $_POST["txtTitle"];
    $content = $_POST["txtContent"];
    $datetime = $_POST["txtDate"];

    if (isset($_FILES["txtImage"]))
        $image = $_POST['txtImage'];
    $image_name = $_FILES['filename']['name'];
    $image_path = $_FILES['filename']['tmp_name'];
    $new_image_path = "upload/images/" . $file_name;
    $uploaded_file = move_uploaded_file($image_path, $new_image_path);
    // $query="insert into table (title, images) values ('$title', '$new_path' )";

    // $query="UPDATE tbnews SET EmployeeName ='{$name}',Age ='{$age}' WHERE EmployeeID ='$code'";

    $query = "UPDATE tbnews SET Title = '{$title}', Content = '{$content}', Image = '{$new_image_path}' , NewsDate = '{$datetime}'";

    $rs = mysqli_query($conn, $query);
    if (!$rs) :
        error_clear_last();
        die("Update Fails");
    endif;
    header("Location: ViewsNews.php");
endif;
mysqli_close($conn);

include 'php/htmlHead.php';
include 'php/sidebar.php';
?>
<div class="DetailsNews">
    <h2>Update News</h2>

    <h4><a href="ViewsNews.php">Back to News</a></h4>
</div>

<div class="navbar">
    <!-- Table News Details  -->
    <div class="navbar">
        <!-- Table News Details  -->
        <div class="navbar-table">
            <form method="post">
                <table class="table table-hove table-bordered">
                    <tr>
                        <td>News ID:</td>
                        <td><input type="text" value="<?= $data[0] ?>" readonly name="txtNewsid"></td>
                    </tr>

                    <tr>
                        <td>Title:</td>
                        <td><input type="text" value="<?= $data[1] ?>" readonly name="txtTitle"></td>
                    </tr>

                    <tr>
                        <td>Comment:</td>
                        <td><input type="text" value="<?= $data[2] ?> " readonly name="txtContent"></td>
                    </tr>

                    <tr>
                        <td>Image:</td>
                        <td style="text-align:center"><img src="<?= $data[3] ?>" alt="Image" width="40" height="30" aria-readonly="" name="txtImage"></td>
                    </tr>

                    <tr>
                        <td>Date Time:</td>
                        <td> <input type="text" value="<?= $data[4] ?>" readonly name="txtDate"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="txtSubmit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include 'php/htmlBody.php';
?>