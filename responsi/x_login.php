<?php 
	session_start();
	include 'admin/config.php';
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$pas=md5($pass);
	$query=mysqli_query($koneksi, "select * from admin where uname='$uname' and pass='$pas'")or die(mysqli_error($koneksi));
	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
		if(mysqli_num_rows($query)==1){
			$_SESSION['uname']=$uname;
			header("location:admin/index.php");
		}else{
			header("location:index.php?pesan=gagal")or die(mysqli_error($koneksi));
		}
	}
	else{
		header("location:index.php?pesan=captcha")or die(mysqli_error($koneksi));
	}
 ?>