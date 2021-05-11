<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <div class="loginbox">
    <img src="avvv.png" class="avatar">
         <h1>W E L C O M E</h1>
    <form action="back/login.php" method="POST">
        <label>Username: </label>
        <input type="text" name="uname" placeholder="Enter username">
        <br>
        <br>
        <label>Password: </label>
        <input type="password" name="pass" placeholder="Enter password">
        <br>
        <br>
        <input type="submit" name="" value="Login"><br>
        <br>
        <p>
            No account?
            <a href="pages/register.php">Register here.</a>
        </p>
    </form>
</div>

</body>
</html>