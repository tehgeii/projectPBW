<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:admin.php");
    exit();
}

$pesan = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = md5($_POST['pass']); 

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:admin.php");
    } else {
        $pesan = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #121212; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card { width: 350px; background: rgba(255,255,255,0.1); color: white; border: 1px solid #333; }
    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center mb-3">Welcome to WuWaFan</h3>
        <?php if($pesan): ?><div class="alert alert-danger p-1 text-center small"><?= $pesan ?></div><?php endif; ?>
        <form method="post">
            <input type="text" name="user" class="form-control mb-2" placeholder="Username contoh: april" required>
            <input type="password" name="pass" class="form-control mb-3" placeholder="Password contoh: april" required>
            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
        </form>
    </div>
</body>
</html>