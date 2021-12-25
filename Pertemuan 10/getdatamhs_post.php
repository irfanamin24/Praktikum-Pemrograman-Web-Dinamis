<?php
    require_once "koneksi.php";
    $cari = $_GET['cari'];
    $sql="select * from mahasiswa where NIM like'%".$cari."%'";
    $query = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    header('content-type: application/json');
    echo json_encode($data);
    mysqli_close($con);
?>