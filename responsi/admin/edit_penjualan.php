<?php 
	include 'header.php';
	include 'config.php';
?>

	<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="kue.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Kue</a></li>
			<li class="active"><a href="penjualan.php"><span class="glyphicon glyphicon-briefcase"></span>  Penjualan</a></li>
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li> 
			<li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
<div class="col-md-10">

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Kue</h3>
<a class="btn" href="penjualan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg = $_GET['id'];
$det=mysqli_query($koneksi, "select * from penjualan where id='$id_brg'")or die(mysqli_error($koneksi));

while($d=mysqli_fetch_array($det)){
?>					
	<form action="../update/update_penjualan.php" method="post">
		<table style='font-family:"Arial", Courier, monospace; font-size:100%' class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal Penjualan</td>
				<td><input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Nama/Aneka Kue</td>
				<td>
					<select class="form-control" name="nama">
						<?php 
						$brg=mysqli_query($koneksi, "select * from kue");
						while($b=mysqli_fetch_array($brg)){
						?>	
							<option <?php if($d['nama']==$b['nama']){echo "selected"; } ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
						<?php 
						}
						?>
					</select>
				</td>
			</tr>		

			<tr>
				<td>Harga Jual</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php 
}
?>

 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php 
include 'footer.php';
?>