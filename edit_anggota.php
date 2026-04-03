<?php
include'../koneksi.php';
$id = $_GET['id'];
$query_anggota = mysqli_query($koneksi, "SELECT*FROM anggota WHERE id_anggota='$id'");
$data_anggota = mysqli_fetch_array($query_anggota);
?>

<h4>👥Tambah Data Anggota</h4>
<form method="post" action="#" class="mt-3">
    <input value="<?= $data_anggota['nis'] ?>" type="number" name="NIS" class="form-control mb-2" 
    placeholder="Masukan NIS" required>
    <input value="<?= $data_anggota['nama_anggota'] ?>" type="text" name="Nama_Anggota" class="form-control mb-2" 
    placeholder="Masukan Nama Anggota" required>
    <input value="<?= $data_anggota['username'] ?>" type="text" name="Username" class="form-control mb-2" 
    placeholder="Masukan Username" required>
   <input value="<?= $data_anggota['password'] ?>" type="text" name="Pass" class="form-control mb-2"
    placeholder="Masukan Password" required>
   <input value="<?= $data_anggota['kelas'] ?>" type="text" name="Kelas" class="form-control mb-2" 
   placeholder="Masukan Kelas" required>
  
   <button type="submit" name="tombol" class="btn btn-primary">💾SIMPAN</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $nis = $_POST['NIS'];
    $nama_anggota = $_POST['Nama_Anggota'];
    $username = $_POST['Username'];
    $pass = $_POST['Pass'];
    $kelas = $_POST['Kelas'];
    include'../koneksi.php';
    $query = "UPDATE anggota SET nis='$nis', nama_anggota='$nama_anggota', username='$username',
     password='$pass', kelas='$kelas' WHERE id_anggota='$id' ";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo"<script>alert('✅Data Berhasil Disimpan'); window.location.assign('?Halaman=data_anggota');</script>";
    }else{
        echo"<script>alert('❌Data Gagal Disimpan'); window.location.assign('?Halaman=data_anggota');</script>";
    }
}