<?php
session_start();
include '../koneksi.php';
date_default_timezone_set("Asia/Jakarta");

$id = $_GET['id'];
$id_anggota = $_SESSION['id_anggota'];
$tgl = date('Y-m-d H:i:s');

mysqli_query($koneksi, "INSERT INTO transaksi
(id_anggota,id_buku,tgl_pinjam,status_transaksi)
VALUES ('$id_anggota','$id','$tgl','Peminjaman')");

mysqli_query($koneksi, "UPDATE buku SET status='tidak' WHERE id_buku='$id'");

echo "<script>
        alert('🛒Buku berhasil dipinjam');
        window.location='dashboard.php';
      </script>";
?>
