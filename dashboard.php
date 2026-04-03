<?php
session_start();
if(empty($_SESSION['id_anggota'])) {
    header("location:../login-anggota.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Anggota | Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-3 mb-3">
        <h4>Halaman Anggota | Aplikasi Perpustakaan Sekolah Digital</h4>
        <a href="dashboard.php" class="btn btn-success text-white">Dashboard</a>
        <a href="?Halaman=history" class="btn btn-success text-white">History Peminjaman</a>
        <a href="logout.php" class="btn btn-danger text-white">logout</a>
        <div class ="card p-3 mt-3">
            <?php
            $halaman = isset($_GET['Halaman']) ? $_GET['Halaman']:"";
            if(file_exists($halaman.".php")){
                include $halaman.".php";
            }else{ ?>
            <h4> Selamat Datang <?= $_SESSION['nama_anggota']; ?> 👋 </h4>
            <form action="?Halaman=cari" method="post">
                <label class="text-muted">Yuk Cari Buku</label>
                <input type="text" name="kunci" class="form-control mb-2"
                 required placeholder="Masukan Judul Buku">
                <button type="submit" class="btn btn-primary mb-4">🔎 Cari</button>
            </form>
            <h4>🛒 Daftar Buku Yang Dipinjam:</h4>
            <table class="table table-bordered">
                <tr class="pw-bold">
                    <td>No</td>
                    <td>Judul Buku</td>
                    <td>Tanggal Pinjam</td>
                    <td>Pengembalian</td>
                </tr>
                <?php
                include'../koneksi.php';
                $no=1;
                $query = "SELECT*FROM transaksi,buku WHERE buku.id_buku=transaksi.id_buku AND
                 transaksi.id_anggota='$_SESSION[id_anggota]' AND status_transaksi='peminjaman'";
                $data= mysqli_query($koneksi, $query);
                foreach($data as $peminjaman) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $peminjaman['judul_buku'] ?></td>
                            <td><?= $peminjaman['tgl_pinjam'] ?></td>
                            <td>
                                <?php
                                 $link = "'pengembalian buku $peminjaman[judul_buku]', $peminjaman[id_transaksi],
                                  $peminjaman[id_buku]";
                                 ?>
                                 <a onclick="pengembalian(<?= $link ?>)" class="btn btn-success">
                                    ✅ Pengembalian
                                </a>
                            </td>
                        </tr>
                <?php  } ?>
              
            </table>
            <hr>
            <h4>📚Daftar Buku</h4>
            <div class="row">
            <?php
            $data_buku = mysqli_query($koneksi,  "SELECT*FROM buku ORDER BY id_buku DESC");
            foreach($data_buku as $buku){
            ?>
            <div class="col-md-3">
            <div class ="card shadow-sm p-3 d-flex">
                <h5 ><?=  $buku['judul_buku']?></h5>
                <p><strong>Pengarang:</strong><?= $buku['pengarang'] ?></p>
                <p><strong>Penerbit:</strong><?= $buku['penerbit'] ?></p>
                <p><strong>Diterbitkan Tahun:</strong><?= $buku['tahun_terbit'] ?></p>
                <?php if($buku['status']=="tersedia"){ ?>
            <span class= "badge bg-success mb-1">✅ Tersedia</span>
            <?php
            $link= "'❓Apakah Anda Yakin Ingin Meminjam Buku $buku[judul_buku]',$buku[id_buku]";
            ?>
            <a onclick ="pinjam(<?= $link ?>)" class="btn btn-primary text-white">🛒Pinjam</a>
            <?php }else{ ?>
            <span class="badge bg-danger m-1">❌ Tidak Tersedia</span>
            <a class="btn btn-primary text-white disabled">🛒 Pinjam</a>
           <?php } ?>
                </div>
            </div>
           <?php } ?>
        </div>
        <?php } ?>
    </div>
    <script>
        function pinjam(pesan,id_buku){
           if(confirm(pesan)){
            window.location.href = '?Halaman=peminjaman&id=' +id_buku;
           }
        }
        function pengembalian(pesan,id_transaksi,id_buku){
            if(confirm(pesan)){
                window.location.href = '?Halaman=pengembalian&id='+id_transaksi+'&buku='+id_buku;
            }
        }
        </script>
</body>
</html>