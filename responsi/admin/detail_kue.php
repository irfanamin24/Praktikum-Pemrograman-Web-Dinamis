<?php 
	include 'header.php';
	include 'config.php';
?>

	<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li class="active"><a href="kue.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Kue</a></li>
			<li><a href="penjualan.php"><span class="glyphicon glyphicon-briefcase"></span>  Penjualan</a></li> 
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
<div class="col-md-10">

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Kue</h3>
<a class="btn" href="kue.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg = $_GET['id'];
$det=mysqli_query($koneksi, "select * from kue where id='$id_brg'")or die(mysqli_error($koneksi));

while($d=mysqli_fetch_array($det)){
?>					
	<table style='font-family:"Arial", Courier, monospace; font-size:100%' class="table">
		<tr>
			<td>Nama/Aneka Kue</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Modal Awal</td>
			<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
		</tr>
		<tr>
			<td>Harga Jual</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Sisa Kue</td>
			<td><?php echo $d['sisa'] ?></td>
		</tr>
	</table>
<?php 
}
?>

<?php
	include 'footer.php';
?>