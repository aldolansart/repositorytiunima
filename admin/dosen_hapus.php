<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from dosen where dosen_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['dosen_foto'];
unlink("../gambar/dosen/$foto");
mysqli_query($koneksi, "delete from dosen where dosen_id='$id'");
header("location:dosen.php");
