<?php 
    include '../admin/config.php';
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
    $modal=$_POST['modal'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $sisa=$_POST['jumlah'];

    mysqli_query($koneksi, "insert into kue values(NULL,'$nama','$jenis','$modal','$harga','$jumlah','$sisa')");
    header("location:../admin/kue.php");

 ?>