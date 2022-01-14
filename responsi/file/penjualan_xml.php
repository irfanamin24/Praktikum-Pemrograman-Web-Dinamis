<?php
    include "../admin/config.php";
    header('Content-Type: text/xml');
    $query = "SELECT * FROM penjualan";
    $hasil = mysqli_query($koneksi,$query);
    $jumField = mysqli_num_fields($hasil);
    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($hasil)){
        echo "<penjualan>";
        echo"<id>",$data['id'],"</id>";
        echo"<tanggal>",$data['tanggal'],"</tanggal>";
        echo"<nama>",$data['nama'],"</nama>";
        echo"<jumlah>",$data['jumlah'],"</jumlah>";
        echo"<harga>",$data['harga'],"</harga>";
        echo"<total_harga>",$data['total_harga'],"</total_harga>";
        echo"<laba>",$data['laba'],"</laba>";
        echo "</penjualan>";
    }
    echo "</data>";
?>