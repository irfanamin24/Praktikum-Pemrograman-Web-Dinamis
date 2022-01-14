<?php
    include "../admin/config.php";
    $sql="select * from penjualan order by id";
    $tampil = mysqli_query($koneksi,$sql);
    if (mysqli_num_rows($tampil) > 0) {
        $no=1;
        $response = array();
        $response["data"] = array();
        while ($r = mysqli_fetch_array($tampil)) {
            $h['id'] = $r['id'];
            $h['tanggal'] = $r['tanggal'];
            $h['nama'] = $r['nama'];
            $h['jumlah'] = $r['jumlah'];
            $h['harga'] = $r['harga'];
            $h['total_harga'] = $r['total_harga'];
            $h['laba'] = $r['laba'];
            array_push($response["data"], $h);
        }
        echo json_encode($response);
    }
    else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>