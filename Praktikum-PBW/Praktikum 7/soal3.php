<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3</title>
</head>
<body>
    <h2>Daftar Hewan</h2>

    <form action="" method="post">
        <Label for="hewan">Hewan 1 :</Label>
        <input type="text" name="hewan1" required> <br><br>
        <Label for="hewan">Hewan 2 :</Label>
        <input type="text" name="hewan2" required> <br><br>
        <Label for="hewan">Hewan 3 :</Label>
        <input type="text" name="hewan3" required> <br><br>
        <label for="hewan">Hewan 4 :</Label>
        <input type="text" name="hewan4" required> <br><br>
        <label for="hewan">Hewan 5 :</Label>
        <input type="text" name="hewan5" required> <br><br>
        <button type="submit" name="submit">Submit</button> <br><br>
</form>

<?php
if (isset($_POST['submit'])) {

    $hewan1 = $_POST['hewan1'];
        $hewan2 = $_POST['hewan2'];
        $hewan3 = $_POST['hewan3'];
        $hewan4 = $_POST['hewan4'];
        $hewan5 = $_POST['hewan5'];

        $daftarHewan = array($hewan1, $hewan2, $hewan3, $hewan4, $hewan5);

        echo "<h2>Daftar Hewan:</h2>";

        foreach ($daftarHewan as $index => $hewan) {
            echo "Hewan " . ($index + 1) . ": " . $hewan . "<br><br>";
        }
    }
?>

</body>
</html>