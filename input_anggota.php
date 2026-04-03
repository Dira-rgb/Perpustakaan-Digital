<h4>👥Tambah Data Anggota</h4>
<form method="post" action="#" class="mt-3">
    <input type="number" name="NIS" class="form-control mb-2" placeholder="Masukan NIS" required>
    <input type="text" name="Nama_Anggota" class="form-control mb-2" placeholder="Masukan Nama Anggota" required>
    <input type="text" name="Username" class="form-control mb-2" placeholder="Masukan Username" required>
   <input type="text" name="Pass" class="form-control mb-2" placeholder="Masukan Password" required>
   <input type="text" name="Kelas" class="form-control mb-2" placeholder="Masukan Kelas" required>
  
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
    $query = "INSERT INTO anggota(nis,nama_anggota,username,password,kelas) VALUES('$nis', '$nama_anggota',
     '$username', '$pass', '$kelas')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo"<script>alert('✅Data Berhasil Disimpan'); window.location.assign('?Halaman=data_anggota');</script>";
    }else{
        echo"<script>alert('❌Data Gagal Disimpan'); window.location.assign('?Halaman=input_anggota');</script>";
    }
}