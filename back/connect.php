<?php
$con = new mysqli("localhost", "root", "", "job");

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}
