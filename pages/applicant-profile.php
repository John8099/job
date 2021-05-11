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
<style>
    body{
            background-color: lightgray;
        }
    .min{
        border: 6px solid darkslategray;
        border-right: transparent;
        border-bottom: transparent;
        border-left: transparent;
    }
    .mon{
        border: 2px solid darkslategray;
        margin-top: 115px;
        margin-right: 450px;
        margin-left: 450px;
        padding-left: 90px;
        padding-top: 30px;
        padding-bottom: 20px;
        font: 17px Georgia, serif;

        }
    .hak{
        font-size: 30px;
        margin-left: 65px;
    }

</style>
<body>
    <div class="min">
    <?php include "applicant-nav.php" ?>
    <div class="mon">
    <label class="hak">My Profile</label>
    <form action="../back/edit.php?applicant" method="POST">
        <?php
        $user = $con->query("SELECT * FROM users WHERE id = $_SESSION[id]")->fetch_object();
        ?>
        <br><br>
        <label>Fist name</label>
        <input type="text" name="fname" placeholder="Enter First name" value="<?php echo $user->fname ?>" require>
        <br><br>
        <label>Last name: </label>
        <input type="text" name="lname" placeholder="Enter Last name" value="<?php echo $user->lname ?>" require>
        <br><br>
        <label>Birthday: </label>
        <input type="date" name="bday" placeholder="Enter Birthday" value="<?php echo $user->bday ?>" require>
        <br><br>
        <label>Address: </label>
        <input type="text" name="address" placeholder="Enter Address" value="<?php echo $user->address ?>" require>
        <br><br>
        <label>Contact number: </label>
        <input type="text" name="cnum" placeholder="Enter Contact number" value="<?php echo $user->cnum ?>" require>
        <br><br>
        <label>Expertise</label>
        <select name="expertise">
            <?php
            $q = $con->query("SELECT * FROM category");
            ?>
            <option value="<?php echo $user->expertise ?>"><?php echo $con->query("SELECT * FROM category WHERE cat_id=$user->expertise")->fetch_object()->expertise ?></option>
            <?php
            while ($row = $q->fetch_object()) :
                if ($user->expertise != $row->cat_id) :
            ?>
                    <option value="<?php echo $row->cat_id ?>"><?php echo $row->expertise ?></option>
                <?php
                else :
                ?>
            <?php
                endif;
            endwhile;
            ?>
        </select>
        <br><br>
        <label>Username: </label>
        <input type="text" name="uname" placeholder="Enter username" value="<?php echo $user->uname ?>" require>
        <br><br>
        <label>Password: </label>
        <input type="password" name="pass" placeholder="Enter password" require>
        <br><br>
        <button type="submit" style="background-color:silver; color: darkslategray; margin-left: 100px;">Update</button>
        
    </form>
</div>
</div>
</body>

</html>