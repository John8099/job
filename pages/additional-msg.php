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
    <title>Additional Message</title>
</head>

<body>
    <div>
        <label>Additional Message</label>
        <form action="../back/additional-message.php" method="POST">
            <input type="text" name="applicant_id" value="<?php echo $_GET['id'] ?>" readonly hidden>
            <label>Message: </label>
            <textarea name="msg" cols="30" rows="10" placeholder="Your message"></textarea>
            <button type="submit">Send</button>
            <button type="button" onclick="return(window.location.href='applicant-list.php')">Cancel</button>

        </form>
    </div>

</body>

</html>