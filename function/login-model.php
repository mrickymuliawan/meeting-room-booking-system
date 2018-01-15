<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['login'])) {
	$username = $_POST['nama_user'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM tb_user WHERE nama_user='$username' AND password = '$password' ";
	$query = mysqli_query($koneksi,$sql);

	if (mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		$_SESSION['nama_user']	= $result['nama_user'];
		$_SESSION['id_user'] 		= $result['id_user'];
		$_SESSION['role']				= $result['role'];
		header('location:../page/dashboard/dashboard.php'); 
	}else{
		header('location:../page/login/login.php?info=Maaf username dan password tidak cocok');
	}
}elseif(isset($_GET['logout'])){
	session_destroy();
	session_unset();
	header('location:../page/login/login.php?info= Anda telah logout');
}
 
 ?>