<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$dosen = $_SESSION['id'];
$laporan = $_GET['id'];

mysqli_query($koneksi, "insert into riwayat values (NULL,'$waktu','$dosen','$laporan')")or die(mysqli_error($koneksi));

$data = mysqli_query($koneksi,"select * from laporan where laporan_id='$laporan'");
$d = mysqli_fetch_assoc($data);
header("location:../laporan/".$d['laporan_file']);

