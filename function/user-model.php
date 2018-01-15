<?php 
session_start();
require_once 'koneksi.php';
if (isset($_POST['tambahuser'])) 
{
	$namauser=$_POST['namauser'];
	$notelp=$_POST['notelp'];
	$password=md5($notelp);

	
	$query="insert into tb_user (nama_user,no_telp,password,role) values('$namauser','$notelp','$password','user')";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/user.php?info=Berhasil di tambah');


	
}

elseif(isset($_POST['edituser']))
{
	$iduser=$_POST['iduser'];
	$namauser=$_POST['namauser'];
	$notelp=$_POST['notelp'];
	$password=md5($_POST['notelp']);

	$query="update tb_user set nama_user='$namauser',no_telp='$notelp',password='$password' where id_user='$iduser'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/user.php?info=Berhasil di ubah');

}

elseif(isset($_GET['hapususer']))
{
	$iduser=$_GET['iduser'];

	$query="delete from tb_user where id_user='$iduser'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/user.php?info=Berhasil di hapus');

}elseif(isset($_POST['editprofile']))
{
	$iduser = $_POST['iduser'];
	$namauser=$_POST['namauser'];
	$notelp=$_POST['notelp'];

	$query="UPDATE tb_user SET nama_user='$namauser',no_telp='$notelp' WHERE id_user='$iduser'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/user/editprofile.php?info=Profile Berhasil Diupdate');
	$_SESSION['nama_user'] = $namauser;


}elseif(isset($_POST['editpassword']))
{
	$iduser = $_POST['iduser'];
	$password = md5($_POST['password']);
	$confirmpassword = md5($_POST['confirmpassword']);
	if($password != $confirmpassword)
	{
		header('location:../page/user/editpassword.php?info=Password tidak sama');
	}else{
		$query="UPDATE tb_user SET password='$password' WHERE id_user='$iduser'";
		$result=mysqli_query($koneksi,$query);
		header('location:../page/user/editpassword.php?info=Password berhasil diganti');
	}
}elseif(isset($_POST['resetpassword']))
{
	$iduser = $_POST['iduser'];
	$notelp = $_POST['notelp'];
	$password = md5($_POST['notelp']);
	$query = "UPDATE tb_user SET no_telp='$notelp',password='$password' WHERE id_user='$iduser'";
	$result=mysqli_query($koneksi,$query);
	header("location:../page/user/edituser.php?info=Password berhasil direset&iduser=$iduser");
}


 ?>
