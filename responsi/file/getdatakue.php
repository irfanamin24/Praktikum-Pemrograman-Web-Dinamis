<?php
    require_once "../admin/config.php";
    $sql = "select * from kue";
    $query = mysqli_query($koneksi,$sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    header('content-type: application/json');
    echo json_encode($data);
    mysqli_close($koneksi);
?>