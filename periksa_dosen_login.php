<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';


// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM dosen WHERE dosen_username='$username' AND dosen_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['dosen_id'];
	$_SESSION['nama'] = $data['dosen_nama'];
	$_SESSION['username'] = $data['dosen_username'];
	$_SESSION['status'] = "dosen_login";

	header("location:dosen/");
}else{
	header("location:dosen_login.php?alert=gagal");
}

