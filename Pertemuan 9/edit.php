<?php
    // include database connection file
    include_once("koneksi.php");    //menyisipkan file koneksi.php agar dapat terhubung ke server database
    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update'])){    //kondisi jika tersubmit atau terupdate akan memproses querynya
        $nim = $_POST['nim'];   //variabel nim
        $nama=$_POST['nama'];   //variabel nama
        $jkel=$_POST['jkel'];   //variabel jkel
        $alamat=$_POST['alamat'];   //variabel alamat
        $tgllhr=$_POST['tgllhr'];   //variabel tgllhr
        // update user data
        $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");  //query untuk mengupdate nim, nama, jkel, alamat, tgllhr ke dalam server database, berdasarkan nimnya
        // Redirect to homepage to display updated user in list
        header("Location: index.php");  //akan mengalihkan ke index.php
    }
?>

<?php
    // Display selected user data based on id
    // Getting id from url
    $nim = $_GET['nim'];
    // Fetech user data based on id
    $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");   //query untuk menampilkan nim, nama, jkel, alamat, tgllhr ke dalam server database, berdasarkan nim
    while($user_data = mysqli_fetch_array($result)){    //kondisi untuk mengambil data dari sebuah database
        $nim = $user_data['nim'];   //mengambil variabel nim
        $nama = $user_data['nama']; //mengambil variabel nama
        $jkel = $user_data['jkel']; //mengambil variabel jkel
        $alamat = $user_data['alamat']; //mengambil variabel alamat
        $tgllhr = $user_data['tgllhr']; //mengambil variabel tgllhr
    }
?>

<html>
    <head>
        <title>Edit Data Mahasiswa</title>  <!--membuat title sebuah halaman-->
    </head>
    <body>
        <a href="index.php">Home</a>    <!--membuat judul di sebuah halaman-->
        <br/><br/>
        <form name="update_mahasiswa" method="post" action="edit.php">  <!--membuat form dengan nama update_mahasiswa, dengan metode post dan aksinya jika tersubmit akan ke edit.php-->
            <table border="0">  <!--membuat tabel-->
                <tr>
                    <td>Nama</td>   <!--membuat kolom nama-->
                    <td><input type="text" name="nama" value=<?php echo $nama;?>></td>  <!--membuat kolom input bernama = nama, dengan type text-->
                </tr>
                <tr>
                    <td>Gender</td> <!--membuat kolom gender-->
                    <td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>  <!--membuat kolom input bernama = jkel, dengan type text-->
                </tr>
                <tr>
                    <td>alamat</td> <!--membuat kolom alamat-->
                    <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>  <!--membuat kolom input bernama = alamat, dengan type text-->
                </tr>
                <tr>
                    <td>Tgl Lahir</td>  <!--membuat kolom tgllhr-->
                    <td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>  <!--membuat kolom input bernama = tgllhr, dengan type text-->
                </tr>
                <tr>
                    <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>  <!--membuat kolom input bernama = nim, dengan type hidden, dan bervalue nim yang diambil dari database-->
                    <td><input type="submit" name="update" value="Update"></td> <!--membuat kolom input untuk update dengan type submit>
                </tr>
            </table>
        </form>
    </body>
</html>