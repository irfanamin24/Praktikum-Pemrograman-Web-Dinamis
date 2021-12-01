<?php
    // include database connection file
    include_once("koneksi.php");       //menyisipkan file koneksi.php agar dapat terhubung ke server database
    // Get id from URL to delete that user
    $nim = $_GET['nim'];    //variabel nim berdasarkan dari nim di database
    // Delete user row from table based on given id
    $result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim='$nim'"); //query untuk delete data berdasarkan nim yg berada di database
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:index.php");       //akan beralihkan ke index.php
?>