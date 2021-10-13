<?php
    echo "<head><title>My Guest Book</title></head>";   //membuat judul My guest book
    $fp = fopen("guestbook.txt","r");   //melakukan akses ke file guestbook.txt dengan aksi membaca
    echo "<table border=0>";    //membuat table
    while ($isi = fgets($fp,80)){   //mengambil isi dari file guestbook.txt
        $pisah = explode("|",$isi); //kemudian dipisahkan isi-isinya
        
        echo "<tr><td>Nama </td><td>: $pisah[0]</td></tr>"; //membuat output pada nama
        echo "<tr><td>Alamat </td><td>: $pisah[1]</td></tr>";   //membuat output pada alamat
        echo "<tr><td>Email </td><td>: $pisah[2]</td></tr>";    //membuat output pada email
        echo "<tr><td>Status </td><td>: $pisah[3]</td></tr>";   //membuat output pada status
        echo "<tr><td>Komentar </td><td>: $pisah[4]</td></tr>
        <tr><td>&nbsp;<hr></td><td>&nbsp;<hr></td></tr>";   //membuat output pada komentar dan nbsp untuk membuat spasi
    }
    echo "</table>";
    echo "<a href=bukutamu.php> Klik Disini </a>Isi Form Buku Tamu";    //membuat link isi form buku tamu
?>