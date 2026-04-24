<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mobil WHERE ID = '$id'");
$data = $result->fetch_assoc();
?>

<h2>Edit Data Mobil</h2>

<form method="POST" action="proses_edit.php">
    <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">

    Nama Mobil:
    <input type="text" name="nama_mobil" value="<?php echo $data['Nama_Mobil']; ?>">
    <br><br>

    Merk:
    <input type="text" name="merk" value="<?php echo $data['Merk']; ?>">
    <br><br>

    Warna:
    <input type="text" name="warna" value="<?php echo $data['Warna']; ?>">
    <br><br>

    Tahun:
    <input type="number" name="tahun" value="<?php echo $data['Tahun']; ?>">
    <br><br>

    Harga:
    <input type="number" name="harga" value="<?php echo $data['Harga']; ?>">
    <br><br>

    Stok:
    <input type="number" name="stok" value="<?php echo $data['Stok']; ?>">
    <br><br>

    <button type="submit">Update</button>
</form>