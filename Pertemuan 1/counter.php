<?php
    $filecounter="counter.txt";     //sebagai variabel untuk menyimpan data disebuah file, di code ini outputnya akan di save di counter.txt
    $fl=fopen($filecounter,"r+");   //dengan pertama membuka sebuah file dan dengan perintah read
    $hit=fread($fl,filesize($filecounter)); //lalu file tersebut dibaca secara keseluruhan

    echo("<table width=250 align=center border=1 cellspacing=0 cellpadding=0 bordercolor=#0000FF><tr>");    //untuk menampilkan sebuah tabel
    echo("<td width=250 valign=middle align=center>");  //untuk mengatur tabel
    echo("<font face=verdana size=2 color=#FF0000><b>");    //untuk mengatur tampilan
    echo("Anda pengunjung yang ke:");   //menampilkan string "Anda pengunjung yang ke:"
    echo($hit); //menampilkan hitungan pengunjung
    echo("</b></font>");
    echo("</td>");
    echo("</tr></table>");
    fclose($fl);    //kemudian file tersebut ditutup agar tidak terjadi lagi perubahan didalam filenya

    $fl=fopen($filecounter,"w+");   //file counter dibuka dan dperintahkan menulis atau write
    $hit=$hit+1;    //pada variabel ini jika terdapat pengunjung yang membuka web ini akan bertambah + 1
    fwrite($fl,$hit,strlen($hit));     //melakukan penulisan secara menyeluruh
    fclose($fl);    //dan diakhiri dengan ditutupnya file counter.txt
?>