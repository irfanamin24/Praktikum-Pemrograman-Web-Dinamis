<?php
    include('../admin/config.php');

    $id=$_POST['id'];
    $tgl=$_POST['tgl'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];

    $dt=mysqli_query($koneksi, "select * from kue where nama='$nama'");

    $data=mysqli_fetch_array($dt);
    $sisa=$data['jumlah']-$jumlah;

    mysqli_query($koneksi, "update kue set jumlah='$sisa' where nama='$nama'");

    $modal=$data['modal'];
    $laba=$harga-$modal;
    $labaa=$laba*$jumlah;
    $total_harga=$harga*$jumlah;

    mysqli_query($koneksi, "insert into penjualan values(NULL,'$tgl','$nama','$jumlah','$harga','$total_harga','$labaa')")or die(mysqli_error($koneksi));

    $a=mysqli_query($koneksi, "select jumlah from kue where nama='$nama'");

    $b=mysqli_fetch_array($a);
    $kembalikan=$b['jumlah']+$jumlah;

    $c=mysqli_query($koneksi, "update kue set jumlah='$kembalikan' where nama='$nama'");
    mysqli_query($koneksi, "delete from penjualan where id='$id'");
    header("location:../admin/penjualan.php");
?>