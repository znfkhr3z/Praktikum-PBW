<?php
include 'koneksi.php';

$nama_mobil = $_POST['nama_mobil'];
$merk = $_POST['merk'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$stmt = $conn->prepare("INSERT INTO mobil (Nama_Mobil, Merk, Warna, Tahun, Harga, Stok) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiii", $nama_mobil, $merk, $warna, $tahun, $harga, $stok);

if ($stmt->execute()) {
    echo "Data berhasil ditambahkan";
    header("Location: index.php");
}
?>