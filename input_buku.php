<h4>📚Tambah Data Buku</h4>
<form method="post" action="#" class="mt-3">
    <input type="text" name="Judul" class="form-control mb-2" placeholder="Masukan Judul Buku" required>
    <input type="text" name="Pengarang" class="form-control mb-2" placeholder="Masukan Pengarang" required>
    <input type="text" name="Penerbit" class="form-control mb-2" placeholder="Masukan Penerbit" required>
    <input maxlength="4" type="number" name="Tahun_Terbit" class="form-control mb-2"
     placeholder="Masukan Tahun Terbit" required>
    <button type="submit" name="tombol" class="btn btn-primary">💾SIMPAN</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $Judul = $_POST['Judul'];
    $Pengarang = $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $Tahun_Terbit = $_POST['Tahun_Terbit'];
    include'../koneksi.php';
    $query = "INSERT INTO buku(Judul_Buku,Pengarang,Penerbit,Tahun_Terbit,Status) VALUES('$Judul', '$Pengarang',
     '$Penerbit', '$Tahun_Terbit' ,'Tersedia')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo"<script>alert('✅Data Berhasil Disimpan'); window.location.assign('?Halaman=data_buku');</script>";
    }else{
        echo"<script>alert('❌Data Gagal Disimpan'); window.location.assign('?Halaman=input_buku');</script>";
    }
}