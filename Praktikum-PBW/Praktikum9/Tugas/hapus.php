<?php
include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM mobil WHERE ID=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>