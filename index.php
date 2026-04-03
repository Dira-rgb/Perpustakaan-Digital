<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // LOGIN ADMIN
    if($role == "admin"){
        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'
         AND password='$password'");

        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);

            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['nama_admin'] = $data['nama_admin'];

            header("Location: admin/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Login Admin gagal!');</script>";
        }
    }

    // LOGIN ANGGOTA
    elseif($role == "anggota"){
        $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username'
         AND password='$password'");

        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);

            $_SESSION['id_anggota'] = $data['id_anggota'];
            $_SESSION['nama_anggota'] = $data['nama_anggota'];

            header("Location: anggota/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Login Anggota gagal!');</script>";
        }
    }

    else{
        echo "<script>alert('Pilih role dulu!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="vh-100 row justify-content-center align-items-center">
    
    <form method="POST" class="col-md-3 border p-4 bg-white rounded-4">

        <!-- LOGO -->
        <img src="logo.png" width="100px" class="mx-auto d-block mb-2">

        <!-- JUDUL -->
        <h4 class="text-center">Selamat Datang</h4>
        <h5 class="text-center mb-3"> Aplikasi Perpustakaan Sekolah Digital</h5>

        <!-- USERNAME -->
        <input type="text" name="username" class="form-control mb-3"
         placeholder="Masukan Username" required>

        <!-- PASSWORD -->
        <input type="password" name="password" class="form-control mb-3" 
        placeholder="Masukan Password" required>

        <!-- ROLE -->
        <select name="role" class="form-control mb-3" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="anggota">Anggota</option>
        </select>

        <!-- BUTTON -->
        <button type="submit" name="login" class="btn btn-success w-100 mb-2">
            Login
        </button>

        <!-- LINK -->
        <a href="pendaftaran-anggota.php" class="text-decoration-none d-block text-center">
            Daftar Anggota
        </a>

    </form>

</div>

</body>
</html>