<?php
    include "../admin/config.php";
    header('Content-Type: text/xml');
    $query = "SELECT * FROM kue";
    $hasil = mysqli_query($koneksi,$query);
    $jumField = mysqli_num_fields($hasil);
    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($hasil)){
        echo "<kue>";
        echo"<id>",$data['id'],"</id>";
        echo"<nama>",$data['nama'],"</nama>";
        echo"<jenis>",$data['jenis'],"</jenis>";
        echo"<modal>",$data['modal'],"</modal>";
        echo"<harga>",$data['harga'],"</harga>";
        echo"<jumlah>",$data['jumlah'],"</jumlah>";
        echo"<sisa>",$data['sisa'],"</sisa>";
        echo "</kue>";
    }
    echo "</data>";
?>