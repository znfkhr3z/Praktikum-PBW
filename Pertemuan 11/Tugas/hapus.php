<?php
include 'koneksi.php';

$id = $_GET['id'];

$conn->query("DELETE FROM mobil WHERE ID='$id'");

header("Location: index.php");
?>