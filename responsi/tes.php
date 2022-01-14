<html>
<head>
<style media="screen" type="text/css"> 
html,
body {
 margin:0;
 padding:0;
 height:100%;
}
#container {
 min-height:100%;
 position:relative;
}
#header {
 background:#ff0;
 padding:10px;
}
#body {
 padding:10px;
 padding-bottom:60px; /* Height of the footer */
}
#footer {
 position:absolute;
 bottom:0;
 width:100%;
 height:60px; /* Height of the footer */
 background:#6cf;
}
</style>
</head>
<body>
<div id="container">
 <div id="header">
 <h1>Membuat Footer selalu berapa pada posisi bawah</h1>
 </div>
 
 <div id="body">
 Bila isi dari web terlalu sedikit maka footer akan naik ke atas setelah 
bagian isi selesai ditampilkan. Tentu saja tampilan web akan 
kurang menarik apalagi pada monitor yang besar. Teknologi CSS saat ini 
memungkinkan untuk memaksa footer selalu berada pada bagian bawah 
halaman.
 </div>
 
 <div id="footer">
 copyleft 2011 - onestring.volarefm.com
 </div>
</div>
</body>
</html>