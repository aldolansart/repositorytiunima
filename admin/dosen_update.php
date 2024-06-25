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
	mysqli_query($koneksi, "update dosen set dosen_nama='$nama', dosen_username='$username' where dosen_id='$id'");
	header("location:dosen.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:dosen.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/dosen/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update dosen set dosen_nama='$nama', dosen_username='$username', dosen_foto='$x' where dosen_id='$id'");		
		header("location:dosen.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update dpsen set dosen_nama='$nama', dosen_username='$username', dosen_password='$password' where dosen_id='$id'");
	header("location:dosen.php");
}

