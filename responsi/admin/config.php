<?php
	$koneksi = mysqli_connect("localhost","root","","responsi");

	if (mysqli_connect_errno()){
		echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
	}
?>