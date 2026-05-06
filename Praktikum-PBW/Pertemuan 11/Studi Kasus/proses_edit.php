<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];

$stmt = $conn->prepare("UPDATE buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=? WHERE ID=?");
$stmt->bind_param("ssidi", $judul, $penulis, $tahun, $harga, $id);

if ($stmt->execute()) {
    header("Location: index.php");
}
?>