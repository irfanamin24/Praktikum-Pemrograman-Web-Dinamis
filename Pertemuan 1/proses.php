<?php
    $nama = $_POST['nama']; //menyimpan variabel nama
    $alamat = $_POST['alamat']; //menyimpan variabel alamat
    $email = $_POST['email'];   //menyimpan variabel email
    $status = $_POST['status']; //menyimpan variabel status
    $komentar = $_POST['komentar']; //menyimpan variabel komentar

    echo "<head><title>My Guest Book</head></title>";   //dengan judul My Guest Book
    $fp = fopen("guestbook.txt","a+");  //melakukan akses ke file guextbook.txt dengan aksi menulis dan membaca
    fputs($fp,"$nama|$alamat|$email|$status|$komentar\n");  //menuliskan nama | alamat | email | komentar
    fclose($fp);    //dan melakukan penutupan file
    echo "Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu<br>"; //menampilkan Terima kasih dst
    echo "<a href=tampilan.php> Isi Buku Tamu </a><br>"; //membuat link isi buku tamu
    echo "<a href=lihat.php> Lihat Buku Tamu </a><br>"; //mambuat link untuk lihat buku tamu
?>