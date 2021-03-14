<?php
include "connect.php";
session_start();

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$q = $con->query("SELECT * FROM users WHERE uname='$uname'");

if ($q->num_rows > 0) {
    $user = $q->fetch_object();
    if (password_verify($pass, $user->pass)) {
        $_SESSION["id"] = $user->id;
        $userType = $user->usertype;
        if ($userType == "admin") {
            echo "
            <script>
                alert('Welcome Admin $user->uname.')
                window.location.href = '../pages/admin-list.php'
            </script>";
        } else if ($userType == "applicant") {
            echo "
            <script>
                alert('Welcome $user->fname $user->lname.')
                window.location.href = '../pages/my-jobs.php'
            </script>";
        } else if ($userType == "employer") {
            echo "
            <script>
                alert('Welcome $user->fname $user->lname.')
                window.location.href = '../pages/applicant-list.php'
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Password not match.')
            window.location.href = '../'
        </script>";
    }
} else {
    echo "<script>
        alert('Username not found.')
        window.location.href = '../'
    </script>";
}
