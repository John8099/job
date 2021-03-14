<?php
session_start();
include "connect.php";

$uname = $_POST["uname"];
$pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);

$checkUname = $con->query("SELECT * FROM users WHERE uname = '$uname'");

if ($checkUname->num_rows > 0) {
    echo '
    <script>
        alert("Username \"' . $uname . '\" already exist.\nPlease try again.")
        window.location.href = "../pages/add-admin.php"
    </script>
';
} else {
    $q = $con->query("INSERT INTO users(uname, pass, usertype) VALUES('$uname','$pass', 'admin')");

    if ($q) {
        echo "<script>
            alert('Admin added successfully');
            window.location.href = '../pages/admin-list.php';
        </script>";
    }
}
