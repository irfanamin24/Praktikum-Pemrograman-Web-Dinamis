<?php 
    include '../admin/config.php';
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
    $modal=$_POST['modal'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];

    mysqli_query($koneksi, "update kue set nama='$nama', jenis='$jenis', modal='$modal', harga='$harga', jumlah='$jumlah' where id='$id'");
    header("location:../admin/kue.php");
?>