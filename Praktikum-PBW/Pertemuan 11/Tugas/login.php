<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = $query->fetch_assoc();

    if($data){
        $_SESSION['login'] = true;
        header("Location: index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Toko Mobil Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
        }
        .login-card{
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <div class="card login-card p-4" style="width: 400px;">
        
        <h3 class="text-center mb-3">Toko Mobil Sport</h3>
        <p class="text-center text-muted">Silakan Login</p>

        <?php if(isset($error)) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">
                Login
            </button>

        </form>

        <p class="text-center mt-3 text-muted" style="font-size: 13px;">
            © 2026 Toko Mobil Sport
        </p>

    </div>

</div>

</body>
</html>