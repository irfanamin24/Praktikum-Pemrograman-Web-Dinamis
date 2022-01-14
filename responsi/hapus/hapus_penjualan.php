<?php 
    include '../admin/config.php';

    $id=$_GET['id'];
    $jumlah=$_GET['jumlah'];
    $nama=$_GET['nama'];

    $a=mysqli_query($koneksi, "select jumlah from kue where nama='$nama'");
    $b=mysqli_fetch_array($a);
    $kembalikan=$b['jumlah']+$jumlah;
    $c=mysqli_query($koneksi, "update kue set jumlah='$kembalikan' where nama='$nama'");
    mysqli_query($koneksi, "delete from penjualan where id='$id'");
    header("location:../admin/penjualan.php");
 ?>