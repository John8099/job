<?php
include "../back/connect.php";
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>

<body>
    <div>
        <label>Add Category</label>
        <form action="../back/add-category.php" method="POST">
            <label>Category: </label>
            <input type="text" name="cat" placeholder="Enter Category">
            <button type="submit">Add</button>
            <button type="button" onclick="return(window.location.href='category-list.php')">Cancel</button>

        </form>
    </div>

</body>

</html>