<?php 
require_once 'koneksi.php';
if (isset($_POST['tambahruang'])) 
{

	$kapasitas=$_POST['kapasitas'];
	$namaruang=$_POST['namaruang'];
	$lantairuang=$_POST['lantairuang'];
	$gedung=$_POST['gedung'];
	$ketersediaan='tersedia';
	$query="insert into tb_ruang (nama_ruang,lantai_ruang,gedung,kapasitas,ketersediaan) 
					values('$namaruang','$lantairuang','$gedung','$kapasitas','$ketersediaan')";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/ruangrapat/ruangrapat.php?info=Berhasil di tambah');
	
}

elseif(isset($_POST['editruang']))
{
	$idruang=$_POST['idruang'];
	$kapasitas=$_POST['kapasitas'];
	$namaruang=$_POST['namaruang'];
	$lantairuang=$_POST['lantairuang'];
	$gedung=$_POST['gedung'];
	$ketersediaan=$_POST['ketersediaan'];
	$query="update tb_ruang set nama_ruang='$namaruang',
					lantai_ruang='$lantairuang',gedung='$gedung',kapasitas='$kapasitas',ketersediaan='$ketersediaan' 
					where id_ruang='$idruang'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/ruangrapat/ruangrapat.php?info=Berhasil di ubah');

}

elseif(isset($_GET['hapusruang']))
{
	$idruang=$_GET['idruang'];

	$query="delete from tb_ruang where id_ruang='$idruang'";
	$result=mysqli_query($koneksi,$query);
	header('location:../page/ruangrapat/ruangrapat.php?info=Berhasil di hapus');

}
 ?>
