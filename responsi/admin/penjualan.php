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
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
<div class="col-md-10">
<div class="col-md-12">
	<a style="margin-bottom:10px" href="../file/penjualan_xml.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  XML</a>
	<a style="margin-bottom:10px" href="../file/penjualan_json.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  JSON</a>
</div>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Penjualan Kue</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Input Penjualan</button>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal</option>
			<?php 
			$pil=mysqli_query($koneksi, "select distinct tanggal from penjualan order by tanggal desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>
</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=mysqli_real_escape_string($koneksi, $_GET['tanggal']);
	$tg="../laporan/lap_penjualan.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="../laporan/lap_penjualan.php";
}
?>

<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table style='font-family:"Arial", Courier, monospace; font-size:100%'  class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama/Aneka Kue</th>
		<th>Harga Terjual / Pcs</th>
		<th>Total Harga</th>
		<th>Jumlah</th>			
		<th>Keuntungan</th>			
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal = $_GET ['tanggal'];
		$brg=mysqli_query($koneksi, "select * from penjualan where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysqli_query($koneksi, "select * from penjualan order by tanggal desc");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
	?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['total_harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>			
			<td><?php echo "Rp.".number_format($b['laba']).",-"?></td>			
			<td>		
				<a href="edit_penjualan.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='../hapus/hapus_penjualan.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php 
	}
	?>
	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal = $_GET ['tanggal'];
			$x=mysqli_query($koneksi, "select sum(total_harga) as total from penjualan where tanggal='$tanggal'");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{
			$x=mysqli_query($koneksi, "select sum(total_harga) as total from penjualan");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}
		?>
	</tr>
	<tr>
		<td colspan="7">Total Keuntungan</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal = $_GET['tanggal'];
			$x=mysqli_query($koneksi, "select sum(laba) as total from penjualan where tanggal='$tanggal'");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{
			$x=mysqli_query($koneksi, "select sum(laba) as total from penjualan");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}
		?>
	</tr>
</table>
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Input Penjualan
				</div>
				<div class="modal-body">				
					<form action="../input/x_tambah_penjualan.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" required oninvalid="this.setCustomValidity('Tanggal tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama/Aneka Kue</label>								
							<select class="form-control" name="nama">
								<?php 
								$brg=mysqli_query($koneksi, "select * from kue");
								while($b=mysqli_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Harga Jual / Pcs</label>
							<input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	$(document).ready(function(){
		$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
	});
</script>
	
<?php
	include 'footer.php';
?>