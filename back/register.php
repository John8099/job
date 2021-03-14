<?php
session_start();
include "connect.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$bday = $_POST["bday"];
$address = $_POST["address"];
$cnum = $_POST["cnum"];
$expertise_id = $_POST["expertise"];
$uname = $_POST["uname"];
$pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);
$userType = $_POST["userType"];

$check_uname = $con->query("SELECT * FROM users WHERE uname = '$uname'");
if ($check_uname->num_rows > 0) {
    echo '
    <script>
        alert("Username \"' . $uname . '\" already exist.\nPlease try again.")
        window.location.href = "../pages/register.php"
    </script>';
}

$getExpertise = $con->query("SELECT * FROM category WHERE cat_id = $expertise_id");
$expertise = $getExpertise->fetch_object()->expertise;

$forAllert = strtoupper($expertise[0]) . substr($expertise, 1, strlen($expertise) - 1);

$q = $con->query("INSERT INTO users(fname, lname, bday, `address`, cnum, expertise, uname, pass, usertype) VALUES('$fname','$lname','$bday','$address','$cnum','$expertise_id','$uname','$pass','$userType')");

if ($q) {
    echo '
    <script>
        alert("' . $forAllert . " " . $fname . " " . $lname . '  successfully added.\nPlease Login to continue.")
        window.location.href = "../"
    </script>
    ';
}
