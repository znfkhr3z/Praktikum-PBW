<?php 
session_start();
// Proteksi halaman: jika belum login, lempar ke login.php
if($_SESSION['status'] != "login"){
    header("location:login.php");
}
include 'koneksi.php';
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h2 class="mb-0">Data Buku</h2>
            <a href="tambah_buku.php" class="btn btn-light text-success fw-bold">+ Tambah Buku</a>
            </div>

            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Judul']; ?></td>
                        <td><?php echo $row['Penulis']; ?></td>
                        <td><?php echo $row['Tahun_Terbit']; ?></td>
                        <td>Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-3 text-end">
                <a href="logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>