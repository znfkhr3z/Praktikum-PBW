<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM buku WHERE ID = '$id'");
$data = $result->fetch_assoc();
?>

<h2>Edit Buku</h2>

<form method="POST" action="proses_edit.php">
    <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">

    Judul: <input type="text" name="judul" value="<?php echo $data['Judul']; ?>"><br><br>
    Penulis: <input type="text" name="penulis" value="<?php echo $data['Penulis']; ?>"><br><br>
    Tahun: <input type="number" name="tahun" value="<?php echo $data['Tahun_Terbit']; ?>"><br><br>
    Harga: <input type="number" name="harga" value="<?php echo $data['Harga']; ?>"><br><br>

    <button type="submit">Update</button>
</form>