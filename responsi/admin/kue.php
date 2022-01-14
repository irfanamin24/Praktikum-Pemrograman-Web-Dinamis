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

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Kue</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Kue</button>
<br/><br/>

<?php 
$periksa=mysqli_query($koneksi, "select * from kue where jumlah <=3");

while($q=mysqli_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
<?php 
	$per_hal=10;
	$jumlah_record=mysqli_query($koneksi, "SELECT COUNT(*) from kue");
	$jum=mysqli_fetch_array($jumlah_record);
	$halaman=ceil($jum[0] / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<a style="margin-bottom:10px" href="../laporan/lap_kue.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
	<a style="margin-bottom:10px" href="../file/kue_xml.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  XML</a>
	<a style="margin-bottom:10px" href="../file/kue_json.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  JSON</a>
</div>

</form>
<br/>
<table style='font-family:"Arial", Courier, monospace; font-size:100%' class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama/Aneka Kue</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Jumlah</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=$_GET['cari'];
		$brg=mysqli_query($koneksi, "select * from kue where nama like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysqli_query($koneksi, "select * from kue limit $start, $per_hal");
	}
	$no=1;

	while($b=mysqli_fetch_array($brg)){
	?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="detail_kue.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_kue.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='../hapus/hapus_kue.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
	<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
			$x=mysqli_query($koneksi, "select sum(modal) as total from kue");	
			$xx=mysqli_fetch_array($x);			
			echo "<b> Rp.". number_format($xx['total']).",-</b>";		
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Aneka Kue Baru</h4>
			</div>
			<div class="modal-body">
				<form action="../input/x_tambah_kue.php" method="post">
					<div class="form-group">
						<label>Nama/Aneka Kue</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama/Aneka Kue .." required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Kue ..">
					</div>
					<div class="form-group">
						<label>Modal Awal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal satuan">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual satuan">
					</div>	
					<div class="form-group">
						<label>Jumlah Kue</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>