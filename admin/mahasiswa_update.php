<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update mahasiswa set mahasiswa_nama='$nama', mahasiswa_username='$username' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:mahasiswa.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/mahasiswa/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update mahasiswa set mahasiswa_nama='$nama', mahasiswa_username='$username', mahasiswa_foto='$x' where mahasiswa_id='$id'");		
		header("location:mahasiswa.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update mahasiswa set mahasiswa_nama='$nama', mahasiswa_username='$username', mahasiswa_password='$password' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");
}

