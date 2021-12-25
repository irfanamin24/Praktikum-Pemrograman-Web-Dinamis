<?php
    include 'koneksi.php';
?>

<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="getdatamhs_post.php" method="get">
    <label>Cari :</label>
    <input type="text" placeholder="Masukan NIM" name="cari">
    <input type="submit" value="Cari">
</form>