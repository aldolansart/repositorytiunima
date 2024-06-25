<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $mahasiswa = $_SESSION['id'];
$id  = $_POST['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();

$filename = $_FILES['file']['name'];

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

if($filename == ""){

	mysqli_query($koneksi, "update laporan set laporan_kode='$kode', laporan_nama='$nama', laporan_kategori='$kategori', laporan_keterangan='$keterangan' where laporan_id='$id'")or die(mysqli_error($koneksi));
	header("location:laporan.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:laporan.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from laporan where laporan_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['laporan_file'];
		unlink("../laporan/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../laporan/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update laporan set laporan_kode='$kode', laporan_nama='$nama', laporan_jenis='$jenis', laporan_kategori='$kategori', laporan_keterangan='$keterangan', laporan_file='$nama_file' where laporan_id='$id'")or die(mysqli_error($koneksi));
		header("location:laporan.php?alert=sukses");
	}
}

