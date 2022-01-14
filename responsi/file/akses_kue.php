<?php
    $url = "https://shop.irfanamin24.site/file/getdatakue.php";
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($client);
    $result = json_decode($response);
    foreach ($result as $r) {
        echo "<p>";
        echo "ID : " . $r->id . "<br />";
        echo "Nama : " . $r->nama . "<br />";
        echo "Jenis : " . $r->jenis . "<br />";
        echo "Modal : " . $r->modal . "<br />";
        echo "Harga : " . $r->harga . "<br />";
        echo "Jumlah : " . $r->jumlah . "<br />";
        echo "Sisa : " . $r->sisa . "<br />";
        echo "</p>";
    }
?>