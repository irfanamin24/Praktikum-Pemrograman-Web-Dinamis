<?php 
    include 'header.php';
    include 'config.php';
?>

	<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="kue.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Kue</a></li>
			<li><a href="penjualan.php"><span class="glyphicon glyphicon-briefcase"></span>  Penjualan</a></li> 
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
<div class="col-md-10">

<?php
	$a = mysqli_query($koneksi, "select * from penjualan");
?>

<div class="col-md-10">
	<h3>Selamat datang</h3>	
    <h3>Website Pengelolaan Penjualan Kue</h3>
    <h3>1900018269 - IRFAN AMIN</h3>
</div>
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
	include 'footer.php';
?>