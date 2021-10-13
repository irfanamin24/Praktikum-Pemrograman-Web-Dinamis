<?php
    $lokasi_file = $_FILES['fupload']['tmp_name'];  //variabel menentukan lokasi file
    $nama_file = $_FILES['fupload']['name'];    //variabel menyimpan penamaan file yang akan diupload
    $deskripsi = $_POST['deskripsi'];   //variabel meyimpan deskripsi
    $direktori = "$nama_file";  //membuat direktori dengan sebuah lokasi file dan nama filenya
    
    if (move_uploaded_file($lokasi_file, $direktori)){  //kemudian melakukan aksi jika file dipindah ke lokasi file dan cek direktori sama
        echo "Nama File: <b>$nama_file</b> berhasil di upload <br>"; //maka akan mengeluarkan outpt file tersebute berhasil diupload
        echo "Deskripsi File :<br>$deskripsi";  //menampilkan sebuah deskripsi file
    }
    else {  //jika tidak menjalankan aksi yang diatas, maka file terbesut gagal diupload
        echo "File gagal diupload";
    }
?>