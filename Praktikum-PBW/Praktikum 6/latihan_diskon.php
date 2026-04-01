<!DOCTYPE html>
<html>
<head>
  <title>Latihan Nilai Diskon UKT</title>
</head>
<body>
<h2>Perhitungan Diskon Pembayaran UKT</h2>
<hr>
<form method="post">

NPM : <input type="text" name="npm"><br>
Nama : <input type="text" name="nama"><br>
Prodi : <input type="text" name="prodi"><br>
Semester : <input type="number" name="semester"><br>
Biaya UKT : <input type="number" name="bukt"><br><br>

<input type="submit" value="Proses"><br><br>

<?php
if (isset($_POST['bukt'])) {

  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $prodi = $_POST['prodi'];
  $semester = $_POST['semester'];
  $bukt = $_POST['bukt'];

  if ($bukt >= 5000000 && $semester > 8) {
    $diskon = 0.15;
  } 
  else if ($bukt >= 5000000 && $semester <= 8) {
    $diskon = 0.10;
  } 
  else {
    $diskon = 0;
  }

  $bayar = $bukt - ($bukt * $diskon);

  echo "<h3>Hasil Perhitungan</h3>";
  echo "NPM : $npm <br>";
  echo "Nama : $nama <br>";
  echo "Prodi : $prodi <br>";
  echo "Semester : $semester <br>";
  echo "Biaya UKT : Rp " . number_format($bukt,0,",",".") . "<br>";
  echo "Diskon : " . ($diskon * 100) . "% <br>";
  echo "<b>Yang Harus Dibayar : Rp " . number_format($bayar,0,",",".") . "</b>";
}
?>
</form>
</body>
</html>