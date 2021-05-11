<?php
include "connect.php";
session_start();

$id = $_POST["id"];
$user_id = $_POST["user_id"];
$rate = $_POST["rate"];
$comment = $_POST["comment"];

$q = $con->query("UPDATE employment set ratings = '$rate', comment = '$comment' WHERE employment_id = $id");

if ($q) {
    $update_user = $con->query("UPDATE users set hiredby = NULL WHERE id=$user_id");
    if ($update_user) {
        echo "<script>
        alert('Employee rated successfully.');
        window.location.href = '../pages/my-employee.php';
    </script>";
    }
}