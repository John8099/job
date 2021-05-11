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
    <style>
        body{
            background-color: lightgray;
            color: darkslategray;
        }
        .lang{
            border:transparent;
            margin-top: 15px;
            margin-right: 300px;
            margin-left: 300px;
            padding-top: 30px;
            padding-left: 20px;
            padding-bottom: 30px;
            font-family: Georgia, serif;
            
        }
        .rek{
            padding-top: 40px;
            padding-bottom: 70px;
            margin-left: 160px;
            font-size: 40px;
        }
        .che{
            margin-left: 130px;

        }
        .che, textarea{
            margin: auto;
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
            box-shadow: 1px 2px 2px gray;
            border-radius: 10px;

        }
        .che, button {
            margin: auto;
            border-radius: 5px;
        }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Message</title>
</head>

<body>
    <div class="lang">
        <div class="rek">
        <label>Additional Message</label>
    </div>
        <form action="../back/additional-message.php" method="POST">
            <input type="text" name="applicant_id" value="<?php echo $_GET['id'] ?>" readonly hidden>
            <div class="che">
            <label>Message: </label>
            <textarea name="msg" cols="30" rows="10" placeholder="Your message" style="background-color: silver; color: black;"></textarea>
            <button type="submit" style="background-color:silver; color: darkslategray;">Send</button>
            <button type="button" onclick="return(window.location.href='applicant-list.php')" style="background-color:silver; color: darkslategray;">Cancel</button>
        </div>
        </form>
    </div>

</body>

</html>