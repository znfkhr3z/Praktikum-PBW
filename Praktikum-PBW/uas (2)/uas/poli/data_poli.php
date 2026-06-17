<?php
session_start();

//Membatasi akses hanya untuk admin.
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header('Location: /uas/users/login.php');
    exit();
}

include '../config/koneksi.php';

$base = '/uas';

//Mengatur jumlah data per halaman.
$batas   = 10;
$halaman = isset($_GET['hal']) ? max(1, (int)$_GET['hal']) : 1;
$awal    = ($halaman - 1) * $batas;
$cari    = isset($_GET['cari']) ? trim($_GET['cari']) : '';

//Mencari data poli berdasarkan nama.-31
if ($cari !== '') {
    $like = '%' . $cari . '%';
    $stmt = mysqli_prepare(
        $conn,
        //Mengambil data poli dari database.-27
        "SELECT po.id_poli, po.nama_poli,
            //Menghitung jumlah dokter yang aktif di setiap poli.-28
                (SELECT COUNT(*) FROM dokter d WHERE d.spesialis = po.nama_poli AND d.aktif = 1) AS jml_dokter,
                (SELECT COUNT(*) FROM kunjungan k WHERE k.id_poli = po.id_poli) AS jml_kunjungan  //Mengurutkan data poli berdasarkan id secara menurun dan membatasi jumlah data yang ditampilkan sesuai dengan halaman.-29
         FROM poli po
         WHERE po.nama_poli LIKE ?
         ORDER BY po.id_poli DESC LIMIT ?, ?"
    );
    mysqli_stmt_bind_param($stmt, 'sii', $like, $awal, $batas);
    $stmtCount = mysqli_prepare($conn, "SELECT COUNT(*) AS total FROM poli WHERE nama_poli LIKE ?");
    mysqli_stmt_bind_param($stmtCount, 's', $like);
} else {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT po.id_poli, po.nama_poli,
                (SELECT COUNT(*) FROM dokter d WHERE d.spesialis = po.nama_poli AND d.aktif = 1) AS jml_dokter,
                (SELECT COUNT(*) FROM kunjungan k WHERE k.id_poli = po.id_poli) AS jml_kunjungan
         FROM poli po ORDER BY po.id_poli DESC LIMIT ?, ?"
    );
    mysqli_stmt_bind_param($stmt, 'ii', $awal, $batas);
    $stmtCount = mysqli_prepare($conn, "SELECT COUNT(*) AS total FROM poli");
}

//Menjalankan query database.
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_execute($stmtCount);
$total = (int) mysqli_fetch_assoc(mysqli_stmt_get_result($stmtCount))['total'];
$total_hal = max(1, (int) ceil($total / $batas));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Poli — Klinik App</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/admin.css">
</head>
<body class="admin-page">

<?php include '../users/navbar_admin.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Manajemen Poli</h2>
            <a href="<?= $base ?>/poli/tambah_poli.php" class="btn btn-primary">+ Tambah Poli</a>
        </div>

        <form method="GET" class="search-bar">
            <input type="text" name="cari" value="<?= htmlspecialchars($cari) ?>" placeholder="Cari nama poli...">//Menambahkan form pencarian untuk mencari data poli berdasarkan nama. UNTUK CARI POLI
            <button type="submit" class="btn btn-outline">Cari</button>
            <?php if ($cari !== ''): ?>
                <a href="<?= $base ?>/poli/data_poli.php" class="btn btn-outline">Reset</a>
            <?php endif; ?>
        </form>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Poli</th>
                        <th>Jumlah Dokter</th>
                        <th>Total Kunjungan</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                //Menampilkan Data Poli Dari Database dengan nomor urut yang sesuai halaman.
                <?php $no = $awal + 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        //Menampilkan nama poli dengan aman menggunakan htmlspecialchars untuk mencegah XSS.
                        <td><strong><?= htmlspecialchars($row['nama_poli']) ?></strong></td>
                        <td><span class="badge"><?= (int)$row['jml_dokter'] ?> dokter</span></td>
                        <td><span class="badge badge-success"><?= (int)$row['jml_kunjungan'] ?> kunjungan</span></td>
                        <td style="text-align:right;white-space:nowrap;">
                            <a href="<?= $base ?>/poli/edit_poli.php?id=<?= (int)$row['id_poli'] ?>"
                               class="btn btn-outline" style="padding:6px 12px;font-size:12px;">Edit</a> //Menambahkan tombol edit untuk mengedit data poli. UNTUK EDIT POLI
                            <a href="<?= $base ?>/poli/hapus_poli.php?id=<?= (int)$row['id_poli'] ?>"
                               class="btn btn-danger" style="padding:6px 12px;font-size:12px;"
                               onclick="return confirm('Yakin ingin menghapus poli ini?')">Hapus</a> //Menambahkan konfirmasi sebelum menghapus data poli. UNTUK HAPUS POLI
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php if ($total === 0): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;color:var(--text-secondary);padding:30px;">
                            <?= $cari !== '' ? 'Tidak ada poli yang cocok dengan pencarian.' : 'Belum ada data poli.' ?>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if ($total_hal > 1): ?>
            <div class="pagination">
                //Menampilkan navigasi halaman untuk data poli.
                <?php for ($i = 1; $i <= $total_hal; $i++): ?>
                    <?php if ($i === $halaman): ?>
                        <span class="active"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?hal=<?= $i ?><?= $cari !== '' ? '&cari=' . urlencode($cari) : '' ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
