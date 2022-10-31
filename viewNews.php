<!DOCTYPE html>
<html lang="en">
    <?php
    #1. Kiểm tra sesstion 

    #2. Kiểm tra sesion 

    #3.Kết nối CSDL 
        include_once 'DBConnect.php';
    #4. Thực hiện queyry 
        $query = "SElECT * FROM tbnews";
        $rs = mysqli_query($conn, $query);
        $count =  mysqli_num_rows($rs);
    ?>
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>C[R]UD</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class = "container">
        <?php
            if ($count == 0) :
                echo '<div class = "alert-warning">  Recorsd not found! </div>';
            else: 
        ?>
        <table class = "table table-hove table-bordered">
            <tr>
                <th>Id</th>
                <th>News</th>
                <th>Image</th>
                <th>DateTime</th>
            </tr>
            <?php while($field = mysqli_fetch_array($rs)): ?>
            <tr>
                <td><?= $field[0]  ?></td>
                <td><?= $field[1] ?></td>
                <td style="text-align: center"> <img src="<?= $field[2] ?>" alt="image" width="40" height="30"> </td>
                <td><?= $field[3] ?></td>
                <td>
                <td>
                    <a href="Exit.php?code=<?= $field[0] ?>">Exit</a>
                    <a href="Ex04_Delete.php?code=<?= $field[0] ?>"
                    onclick = "return confirm ('Are you sure to delete <?= $field[0 ] ?>')"> Delete </a>
                </td>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php mysqli_close($conn) ?>
</body>
</html>