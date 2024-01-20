<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a class</title>
</head>
<body>
<?php
include_once '../../../connect/open.php';
$sql = "SELECT * FROM categories ";
$categories = mysqli_query($connect, $sql);
include_once '../../../connect/close.php';
?>
<form method="post" action="store.php" enctype="multipart/form-data">
    Name: <input type="text" name="clock_name"><br>
    Publication Year: <input type="date" name="publication_year"><br>
    Quantity: <input type="number" name="quantity"><br>
    Price: <input type="number" name="price"><br>
    Description: <input type="text" name="description"><br>
    Category_id: <select name="category_id">
        <option> - Choose - </option>
        <?php
        foreach ($categories as $cat){
            ?>
            <option value="<?= $cat['id'] ?>">
                <?= $cat['name'] ?>
            </option>
            <?php
        }
        ?>
    </select><br>
    Image: <input type="file" name="image"><br>
    <button>Add</button>
</form>
</body>
</html>
