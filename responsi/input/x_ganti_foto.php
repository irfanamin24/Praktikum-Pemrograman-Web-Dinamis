<?php 
include '../admin/config.php';
$user=$_POST['user'];
$foto=$_FILES['foto']['name'];

$u=mysqli_query($koneksi, "select * from admin where uname='$user'");
$us=mysqli_fetch_array($u);
if(file_exists("foto/".$us['foto'])){
	unlink("foto/".$us['foto']);
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysqli_query($koneksi, "update admin set foto='$foto' where uname='$user'");
	header("location:../admin/ganti_foto.php?pesan=oke");
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysqli_query($koneksi, "update admin set foto='$foto' where uname='$user'");
	header("location:../admin/ganti_foto.php?pesan=oke");
}
?>
