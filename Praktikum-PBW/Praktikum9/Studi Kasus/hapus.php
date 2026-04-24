<?php
include 'koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM buku WHERE ID = '$id'");

header("Location: index.php");
?>