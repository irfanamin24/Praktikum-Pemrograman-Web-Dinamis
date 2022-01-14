<?php
    include "../admin/config.php";
    $sql="select * from kue order by id";
    $tampil = mysqli_query($koneksi,$sql);
    if (mysqli_num_rows($tampil) > 0) {
        $no=1;
        $response = array();
        $response["data"] = array();
        while ($r = mysqli_fetch_array($tampil)) {
            $h['id'] = $r['id'];
            $h['nama'] = $r['nama'];
            $h['jenis'] = $r['jenis'];
            $h['modal'] = $r['modal'];
            $h['harga'] = $r['harga'];
            $h['jumlah'] = $r['jumlah'];
            $h['sisa'] = $r['sisa'];
            array_push($response["data"], $h);
        }
        echo json_encode($response);
    }
    else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>