<?php
include 'koneksi.php';

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$stmt = $conn->prepare("INSERT INTO buku (Judul, Penulis, Tahun_Terbit, Harga, stok) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiii", $judul, $penulis, $tahun_terbit, $harga, $stok);

if ($stmt->execute()) {
    header("Location: index.php");
}
?>