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
    <title>Edit Category</title>
</head>

<body>
    <?php
    $q = $con->query("SELECT * FROM category WHERE id='$_GET[id]'");
    $res = $q->fetch_object();
    ?>
    <div>
        <label>Edit Category</label>
        <form action="../back/edit.php?cat" method="POST">
            <input type="text" name="id" value="<?php echo $_GET['id'] ?>" readonly hidden>
            <label>Category: </label>
            <input type="text" name="cat" placeholder="Enter Category" value="<?php echo $res->expertise ?>">
            <button type="submit">Edit</button>
            <button type="button" onclick="return(window.location.href ='category-list.php')">Cancel</button>

        </form>
    </div>

</body>

</html>