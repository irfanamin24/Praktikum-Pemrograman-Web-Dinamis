<html>
    <head>
        <title>Tambah data mahasiswa</title>    <!-- membuat title sebuah halaman -->
    </head>
    <body>
        <a href="index.php">Go to Home</a>  <!-- membuat link ke goto home -->
        <br/><br/>
        <form action="tambah.php" method="post" name="form1">   <!--membuat form jika ke submit dengan aksi akan ke memproses tambah.php, dengan method post dan nama formnya form1 -->
            <table width="25%" border="0">      <!-- membuat tabel-->
                <tr>
                    <td>Nim</td>    <!--kolom nim-->
                    <td><input type="text" name="nim"></td> <!--membuat kolom input dengan diberi nama = nim, bertype text-->
                </tr>
                <tr>
                    <td>Nama</td>   <!--kolom nama-->
                    <td><input type="text" name="nama"></td>    <!--membuat kolom input dengan diberi nama = nama, bertype text-->
                </tr>
                <tr>
                    <td>Gender (L/P)</td>   <!--membuat kolom gender-->
                    <td><input type="text" name="jkel"></td>    <!--membuat kolom input dengan diberi nama = jkel, bertype text-->
                </tr>
                <tr>
                    <td>Alamat</td>     <!--membuat kolom alamat-->
                    <td><input type="text" name="alamat"></td>  <!--membuat kolom input dengan diberi nama = alamat, bertype text-->
                </tr>
                <tr>
                    <td>Tgl Lahir</td>  <!--kolom tgl lahir-->
                    <td><input type="text" name="tgllhr"></td>  <!--membuat kolom input dengan diberi nama = tgllhr, bertype text-->
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Tambah"></td> <!--membuat submit-->
                </tr>
            </table>
        </form>

        <?php
            // Check If form submitted, insert form data into users table.
            if(isset($_POST['Submit'])) {   //kondisi jika tersubmit akan memproses querynya
                $nim = $_POST['nim'];       //variabel nim
                $nama = $_POST['nama'];     //variabel nama
                $jkel = $_POST['jkel'];     //variabel jkel
                $alamat = $_POST['alamat']; //variabel alamat
                $tgllhr = $_POST['tgllhr']; //variabel tgllhr
                // include database connection file
                include_once("koneksi.php");    //menyisipkan file koneksi.php agar dapat terhubung ke server database
                // Insert user data into table
                $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr) VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr')"); //query untuk menginput nim, nama, jkel, alamat, tgllhr ke dalam server database
                // Show message when user added
                echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
            }
        ?>
    </body>
</html>