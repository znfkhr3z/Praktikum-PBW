<?php
include 'koneksi.php';

$sql = "SELECT * FROM mobil";
$result = $conn->query($sql);
?>
<html lang="id">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white text-center">
            <h2>Showroom Mobil</h2>
            <p class="mb-0">Data Mobil Sport</p>
        </div>

        <div class="card-body">

            <a href="tambah.php" class="btn btn-primary mb-3">
                + Tambah Mobil
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama Mobil</th>
                        <th>Merk/Brand</th>
                        <th>Warna</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Nama_Mobil']; ?></td>
                        <td><?php echo $row['Merk']; ?></td>
                        <td><?php echo $row['Warna']; ?></td>
                        <td><?php echo $row['Tahun']; ?></td>
                        <td>Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['Stok']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Belum ada data mobil</td></tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>