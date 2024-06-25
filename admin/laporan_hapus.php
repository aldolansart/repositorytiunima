<?php 
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from laporan where laporan_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['laporan_file'];
unlink("../laporan/".$nama_file_lama);

mysqli_query($koneksi, "delete from laporan where laporan_id='$id'");
header("location:laporan.php");
