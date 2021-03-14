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
    <title>Add Admin</title>
</head>

<body>
    <div>
        <label>Add Admin</label>
        <form action="../back/add-admin.php" method="POST">
            <label>Username: </label>
            <input type="text" name="uname" placeholder="Enter username">
            <label>Password: </label>
            <input type="password" name="pass" placeholder="Enter password">
            <button type="submit">Submit</button>
            <button type="button" onclick="return(window.location.href ='admin-list.php')">Cancel</button>

        </form>
    </div>

</body>

</html>