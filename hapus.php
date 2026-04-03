<?php
$id = $_GET['id'];
$buku = $_GET['buku'];
include'../koneksi.php';
$data = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi='$id'");
if($data){
    mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$buku'");
    echo"<script>alert('✅ data Peminjaman berhasil dihapus');
    window.location.assign('? Halaman=data_peminjaman')</script>";
}