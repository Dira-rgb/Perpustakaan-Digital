<?php
include'../koneksi.php';
$id = $_GET['id'];
$query_buku = mysqli_query($koneksi, "SELECT*FROM buku WHERE id_buku='$id'");
$data_buku = mysqli_fetch_array($query_buku);
?>
<h4>📚Edit Data Buku</h4>
<form method="post" action="#" class="mt-3">
    <input value="<?= $data_buku['judul_buku'] ?>" type="text" name="Judul" class="form-control mb-2" 
    placeholder="Masukan Judul Buku" required>
    <input value="<?= $data_buku['pengarang'] ?>" type="text" name="Pengarang" class="form-control mb-2"
     placeholder="Masukan Pengarang" required>
    <input value="<?= $data_buku['penerbit'] ?>" type="text" name="Penerbit" class="form-control mb-2"
     placeholder="Masukan Penerbit" required>
    <input value="<?= $data_buku['tahun_terbit'] ?>" maxlength="4" type="number" name="Tahun_Terbit"
     class="form-control mb-2" placeholder="Masukan Tahun Terbit" required>
    <button type="submit" name="tombol" class="btn btn-primary">💾SIMPAN</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $Judul = $_POST['Judul'];
    $Pengarang = $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $Tahun_Terbit = $_POST['Tahun_Terbit'];
    include'../koneksi.php';
    $query = "UPDATE buku SET Judul_Buku='$Judul', Pengarang='$Pengarang', Penerbit='$Penerbit',
     Tahun_Terbit='$Tahun_Terbit' WHERE id_buku='$id'";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo"<script>alert('✅Data Berhasil Disimpan'); window.location.assign('?Halaman=data_buku');</script>";
    }else{
        echo"<script>alert('❌Data Gagal Disimpan'); window.location.assign('?Halaman=input_buku');</script>";
    }
}