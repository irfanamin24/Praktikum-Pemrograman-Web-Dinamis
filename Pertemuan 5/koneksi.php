<?php
    $host="localhost";  //variabel untuk host di servernya
    $username="root";   //variabel untuk username servernya
    $password="";       //variabbel untuk password database
    $databasename="akademik";   //variabel untuk nama databasenya
    $con=@mysqli_connect($host,$username,$password,$databasename); //variabel ini digunakan untuk koneksi ke server database
    
    if (!$con) {    //jika kondisi tidak bisa terhubung ke server akan mencul error dan exit
            echo "Error: " . mysqli_connect_error();
        exit();
    }
?>