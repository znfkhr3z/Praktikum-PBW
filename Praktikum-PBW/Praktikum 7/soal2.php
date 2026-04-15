<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
</head>
<body>
    <h2>Bilangan Genap</h2>

    <form method="post">
        <label>Masukkan Bilangan Awal:</label>
        <input type="number" name="input1" required>
        <br>

        <label>Masukkan Bilangan Akhir:</label>
        <input type="number" name="input2" required>
        <br>

        <button type="submit" name="submit">Submit</button>
        <br><br>
    </form>

<?php
if (isset($_POST['submit'])) {

    $input1 = (int) $_POST['input1'];
    $input2 = (int) $_POST['input2'];

    echo "<b>Bilangan Genap:</b><br>";

    for($i = $input1; $i <= $input2; $i++) {
        if ($i % 2 == 0) {
            echo $i . " ";
        }
    }
}
?>

</body>
</html>