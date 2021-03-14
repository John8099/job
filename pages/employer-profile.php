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
    <title>My Profile</title>
</head>

<body>
    <?php include_once("employer-nav.php") ?>
    <label>My Profile</label>
    <form action="../back/edit.php?employer" method="POST">
        <?php
        $user = $con->query("SELECT * FROM users WHERE id = $_SESSION[id]")->fetch_object();
        ?>
        <label>Fist name</label>
        <input type="text" name="fname" placeholder="Enter First name" value="<?php echo $user->fname ?>" require>
        <label>Last name: </label>
        <input type="text" name="lname" placeholder="Enter Last name" value="<?php echo $user->lname ?>" require>
        <label>Birth day: </label>
        <input type="date" name="bday" placeholder="Enter Birthday" value="<?php echo $user->bday ?>" require>
        <label>Address: </label>
        <input type="text" name="address" placeholder="Enter Address" value="<?php echo $user->address ?>" require>
        <label>Contact number: </label>
        <input type="text" name="cnum" placeholder="Enter Contact number" value="<?php echo $user->cnum ?>" require>
        <label>Username: </label>
        <input type="text" name="uname" placeholder="Enter username" value="<?php echo $user->uname ?>" require>
        <label>Password: </label>
        <input type="password" name="pass" placeholder="Enter password" require>
        <button type="submit">Update</button>

    </form>

</body>

</html>