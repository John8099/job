<?php
session_start();
include "connect.php";
$id = $_GET["id"];
$q;

if (isset($_GET["admin"])) {
    $q = $con->query("DELETE FROM users WHERE id = $id");

    if ($q) {
        echo "<script>
        alert('Admin deleted successfully');
        window.location.href = '../pages/admin-list.php';
    </script>";
    }
} else if (isset($_GET["category"])) {
    $q = $con->query("DELETE FROM category WHERE cat_id = $id");

    if ($q) {
        echo "<script>
        alert('Category deleted successfully');
        window.location.href = '../pages/category-list.php';
    </script>";
    }
}
