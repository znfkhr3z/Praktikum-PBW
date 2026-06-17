<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header('Location: /uas/users/login.php');
    exit();
}

include '../config/koneksi.php';

$base = '/uas';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; //Mengambil ID poli. Memastikan ID poli valid. Mengecek apakah parameter ID ada dan valid.

if ($id > 0) {
    $stmt = mysqli_prepare($conn, "DELETE FROM poli WHERE id_poli = ?"); //Menghapus data berdasarkan ID. Query Hapus, Menghapus Data Poli. Menyiapkan query untuk menghapus data poli dari database berdasarkan ID.
    mysqli_stmt_bind_param($stmt, 'i', $id); //Menjalankan Query. Mengikat parameter ID ke query. Mengikat nilai ID poli ke query yang telah disiapkan.
    @mysqli_stmt_execute($stmt);
}

header('Location: ' . $base . '/poli/data_poli.php'); //Jika berhasil, mengarahkan ke halaman data poli. Mengarahkan pengguna ke halaman daftar poli setelah berhasil menghapus data.
exit();
