<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_mobil = $_POST['nama_mobil'];
$merk = $_POST['merk'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$stmt = $conn->prepare("UPDATE mobil SET Nama_Mobil=?, Merk=?, Warna=?, Tahun=?, Harga=?, Stok=? WHERE ID=?");

$stmt->bind_param("sssiiii", $nama_mobil, $merk, $warna, $tahun, $harga, $stok, $id);

$stmt->execute();

header("Location: index.php");
?>