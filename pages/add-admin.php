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
    <style>
        body{
            background-color: lightgray;
        }
        .ed{
            margin-top: 150px;
            margin-left: 350px;
            max-width: 550px;
            font: 17px Georgia, serif;
            color: silver;
            background-color: darkslategray;
            border-style: solid;
            border-width: 1px;
            padding-top: 20px;
            padding-bottom: 25px;
            padding-right: 25px;
            padding-left: 25px;
            box-shadow: 5px 5px 5px grey;
            border-radius: 15px;  

        }
        .am{
            margin-left: 180px;
            font-size: 30px;
            padding-bottom: 40px;
        }

        .fa{
            margin-left: 200px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="ed">
        <div class="am">
        <label>Add Admin</label>
    </div>
        <form action="../back/add-admin.php" method="POST">
            <label>Username: </label>
            <input type="text" name="uname" placeholder="Enter username">
            <label>Password: </label>
            <input type="password" name="pass" placeholder="Enter password">
            <div class="fa">
            <button type="submit" style="background-color:silver; color: darkslategray;">Submit</button>
            <button type="button" onclick="return(window.location.href ='admin-list.php')" style="background-color:silver; color: darkslategray;">Cancel</button>
        </div>
        </form>
    </div>

</body>

</html>