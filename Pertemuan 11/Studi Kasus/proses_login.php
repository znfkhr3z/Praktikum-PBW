<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if ($query->num_rows > 0) {
    $_SESSION['status'] = "login";
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>