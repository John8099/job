<?php
session_start();
include "connect.php";

$cat = $_POST["cat"];

$checkCat = $con->query("SELECT * FROM category WHERE expertise = '$cat'");

if ($checkCat->num_rows > 0) {
    echo '
    <script>
        alert("Category \"' . $cat . '\" already exist.\nPlease try again.")
        window.location.href = "../pages/add-category.php"
    </script>
';
} else {
    $q = $con->query("INSERT INTO category(expertise) VALUES('$cat')");

    if ($q) {
        echo "<script>
            alert('Category added successfully');
            window.location.href = '../pages/category-list.php';
        </script>";
    }
}