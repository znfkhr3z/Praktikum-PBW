<?php
include 'koneksi.php';

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);
?>

<h2>Data Buku</h2>
<a href="tambah.php">+ Tambah Buku</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?php echo $row['ID']; ?></td>
    <td><?php echo $row['Judul']; ?></td>
    <td><?php echo $row['Penulis']; ?></td>
    <td><?php echo $row['Tahun_Terbit']; ?></td>
    <td><?php echo $row['Harga']; ?></td>
    <td><?php echo $row['stok']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['ID']; ?>">Edit</a>
        |
        <a href="hapus.php?id=<?php echo $row['ID']; ?>">Hapus</a>
    </td>
</tr>
<?php
}
?>
</table>