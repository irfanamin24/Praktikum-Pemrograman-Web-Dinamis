<?php
    $url = "https://shop.irfanamin24.site/file/getdatapenjualan.php";
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($client);
    $result = json_decode($response);
    foreach ($result as $r) {
        echo "<p>";
        echo "ID : " . $r->id . "<br />";
        echo "Tanggal : " . $r->tanggal . "<br />";
        echo "Nama : " . $r->nama . "<br />";
        echo "Jumlah : " . $r->jumlah . "<br />";
        echo "Harga : " . $r->harga . "<br />";
        echo "Total Harga : " . $r->total_harga . "<br />";
        echo "Laba : " . $r->laba . "<br />";
        echo "</p>";
    }
?>