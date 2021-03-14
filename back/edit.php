<?php
session_start();
include "connect.php";
$id = isset($_POST["id"]) ? $_POST["id"] : "";

if (isset($_GET["admin"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $check_uname = $con->query("SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");
    if ($check_uname->num_rows > 0) {
        echo '
    <script>
        alert("Username \"' . $uname . '\" already exist.\nPlease try again.")
        window.location.href = "../pages/edit-admin.php"
    </script>';
        exit();
    }

    $q;

    if ($pass == "") {
        $q = $con->query("UPDATE users SET uname = '$uname' WHERE id=$id");
    } else {
        $new_pass = password_hash($pass, PASSWORD_ARGON2I);
        $q = $con->query("UPDATE users SET uname = '$uname', pass = '$new_pass' WHERE id=$id");
    }

    if ($q) {
        echo "<script>
            alert('Admin updated successfully');
            window.location.href = '../pages/admin-list.php';
        </script>";
    }
} else if (isset($_GET["cat"])) {
    $cat = $_POST["cat"];

    $checkCategory = $con->query("SELECT * FROM category WHERE expertise = '$cat' and cat_id != $id");
    if ($checkCategory->num_rows == 0) {
        $q = $con->query("UPDATE category SET expertise = '$cat' WHERE cat_id=$id");
        if ($q) {
            echo "<script>
                alert('Category updated successfully');
                window.location.href = '../pages/category-list.php';
            </script>";
        }
    } else {
        echo "<script>
                alert('Category already exist.');
                window.location.href = '../pages/edit-category.php?id=$id';
            </script>";
    }
} else if (isset($_GET['applicant'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bday = $_POST["bday"];
    $address = $_POST["address"];
    $cnum = $_POST["cnum"];
    $expertise_id = $_POST["expertise"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $check_uname = $con->query("SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");
    if ($check_uname->num_rows > 0) {
        echo '
        <script>
            alert("Username \"' . $uname . '\" already exist.\nPlease try again.")
            window.location.href = "../pages/applicant-profile.php"
        </script>';
        exit();
    }

    $q;
    if ($pass == "") {
        $q = $con->query("UPDATE users set fname='$fname', lname='$lname', bday='$bday', `address`='$address', cnum='$cnum', expertise='$expertise_id', uname = '$uname' WHERE id=$_SESSION[id]");
    } else {
        $new_pass = password_hash($pass, PASSWORD_ARGON2I);
        $q = $con->query("UPDATE users set fname='$fname', lname='$lname', bday='$bday', `address`='$address', cnum='$cnum', expertise='$expertise_id', uname = '$uname', pass='$new_pass' WHERE id=$_SESSION[id]");
    }

    if ($q) {
        echo "<script>
            alert('Profile updated successfully');
            window.location.href = '../pages/applicant-profile.php';
        </script>";
    }
} else if (isset($_GET['employer'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bday = $_POST["bday"];
    $address = $_POST["address"];
    $cnum = $_POST["cnum"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $check_uname = $con->query("SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");
    if ($check_uname->num_rows > 0) {
        echo '
        <script>
            alert("Username \"' . $uname . '\" already exist.\nPlease try again.")
            window.location.href = "../pages/applicant-profile.php"
        </script>';
        exit();
    }

    $q;
    if ($pass == "") {
        $q = $con->query("UPDATE users set fname='$fname', lname='$lname', bday='$bday', `address`='$address', cnum='$cnum', uname = '$uname' WHERE id=$_SESSION[id]");
    } else {
        $new_pass = password_hash($pass, PASSWORD_ARGON2I);
        $q = $con->query("UPDATE users set fname='$fname', lname='$lname', bday='$bday', `address`='$address', cnum='$cnum', uname = '$uname', pass='$new_pass' WHERE id=$_SESSION[id]");
    }

    if ($q) {
        echo "<script>
            alert('Profile updated successfully');
            window.location.href = '../pages/employer-profile.php';
        </script>";
    }
}
