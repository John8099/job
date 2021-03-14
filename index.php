<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="back/login.php" method="POST">
        <label>Username: </label>
        <input type="text" name="uname" placeholder="Enter username">
        <label>Password: </label>
        <input type="password" name="pass" placeholder="Enter password">
        <button type="submit">Login</button>
        <p>
            No account?
            <a href="pages/register.php">Register here.</a>
        </p>
    </form>

</body>

</html>