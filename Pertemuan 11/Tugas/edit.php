<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mobil WHERE ID='$id'");
$data = $result->fetch_assoc();
?>

<h2>Edit Mobil</h2>

<form method="POST" action="proses_edit.php">
    <input type="hidden" name="id" value="<?= $data['ID'] ?>">

    Nama Mobil: <input type="text" name="nama_mobil" value="<?= $data['Nama_Mobil'] ?>"><br><br>
    Merk: <input type="text" name="merk" value="<?= $data['Merk'] ?>"><br><br>
    Warna: <input type="text" name="warna" value="<?= $data['Warna'] ?>"><br><br>
    Tahun: <input type="number" name="tahun" value="<?= $data['Tahun'] ?>"><br><br>
    Harga: <input type="number" name="harga" value="<?= $data['Harga'] ?>"><br><br>
    Stok: <input type="number" name="stok" value="<?= $data['Stok'] ?>"><br><br>

    <button type="submit">Update</button>
</form>