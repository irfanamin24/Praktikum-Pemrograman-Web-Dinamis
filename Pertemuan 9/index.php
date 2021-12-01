<?php
// Create database connection using config file
include_once("koneksi.php");    //menyisipkan file koneksi.php agar dapat terhubung ke server database
// Fetch all users data from database
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");   //query ini untuk menampilkan isi dari tabel mahasiswa
?>

<html>
    <head>
        <title>Halaman Utama</title>        <!--membuat title sebuah halaman-->
    </head>
    <body>
        <a href="tambah.php">Tambah Data Baru</a><br/><br/>     <!--membuat link untuk tambah data beralir ke tambah.php-->
        <table width='80%' border=1>        <!--membuat table-->
            <tr>
                <th>Nim</th> <th>Nama</th> <th>Gender</th> <th>Alamat</th>      <!--membuat kolom nim, nama, gender, alamat-->
                <th>tgl lahir</th> <th>Update</th>      <!--membuat kolom tgl lhr, dan update-->
            </tr>
        <?php
            while($user_data = mysqli_fetch_array($result)) {   //kondisi untuk mengambil data dari sebuah database
                echo "<tr>";
                echo "<td>".$user_data['nim']."</td>";  //menampilkan nim
                echo "<td>".$user_data['nama']."</td>"; //menampilkan nama
                echo "<td>".$user_data['jkel']."</td>"; //menampilkan jkel
                echo "<td>".$user_data['alamat']."</td>";   //menampilkan alamat
                echo "<td>".$user_data['tgllhr']."</td>";   //menampilkan tgllhr
                echo "<td><a href='edit.php?nim=$user_data[nim]'>Edit</a> | <a href='delete.php?nim=$user_data[nim]'>Delete</a></td></tr>";     //query ini untuk menghapus data berdasarkan nim
            }
        ?>
        </table>
        <a href="lap_mhs.php">Cetak Mahasiswa</a><br/><br/>     <!--membuat link untuk mencetak mahasiswa dengan mengakses ke lap_mhs.php-->
    </body>
</html>