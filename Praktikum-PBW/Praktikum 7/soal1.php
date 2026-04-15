<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
</head>
<body>

<h2>Jenis Kendaraan Berdasarkan Jumlah Roda</h2>

<form method="POST">
    <label>Masukkan jumlah roda:</label>
    <input type="number" name="roda" required>
    <button type="submit" name="submit">Submit</button>
    <br><br>
</form>

<?php
if (isset($_POST['submit'])) {
    $roda = (int) $_POST['roda'];

    switch($roda){
        case 2:
            echo "Sepeda dan Motor";
            break;
        case 3:
            echo "Becak";
            break;
        case 4:
            echo "Mobil, Truk, dan Bus";
            break;
        default:
            echo "Kendaraan tidak diketahui";
    }
}
?>

</body>
</html>