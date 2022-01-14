<?php 
    include '../admin/config.php';
    
    $id=$_GET['id'];
    mysqli_query($koneksi, "delete from kue where id='$id'");
    
    header("location:../admin/kue.php");
?>