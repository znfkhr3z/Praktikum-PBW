<?php

$conn = new mysqli("localhost", "root", "", "toko_mobil_sport");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>