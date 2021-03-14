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
    <title>Edit Admin</title>
</head>

<body>
    <?php
    $q = $con->query("SELECT * FROM users WHERE id='$_GET[id]'");
    $res = $q->fetch_object();
    ?>
    <div>
        <label>Edit Admin</label>
        <form action="../back/edit.php?admin" method="POST">
            <input type="text" name="id" value="<?php echo $_GET['id'] ?>" readonly hidden>
            <label>Username: </label>
            <input type="text" name="uname" placeholder="Enter username" value="<?php echo $res->uname ?>">
            <label>Password: </label>
            <input type="password" name="pass" placeholder="Enter password">
            <button type="submit">Edit</button>
            <button type="button" onclick="return(window.location.href ='admin-list.php')">Cancel</button>

        </form>
    </div>

</body>

</html>