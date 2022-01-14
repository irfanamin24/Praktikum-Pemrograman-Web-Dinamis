<?php 
    include 'header.php';
?>

	<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="kue.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Kue</a></li>
			<li><a href="penjualan.php"><span class="glyphicon glyphicon-briefcase"></span>  Penjualan</a></li> 
			<li class="active"><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
<div class="col-md-10">

<h3><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</h3>
<?php 
if(isset($_GET['pesan'])){
	$pesan=$_GET['pesan'];
	if($pesan=="oke"){
		echo "<div class='alert alert-success'>Foto berhasil di ganti !! </div>";
	}
}
?>

<div class="col-md-5 col-md-offset-3">
	<form action="../input/x_ganti_foto.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>">
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input name="foto" type="file" class="form-control" placeholder="Password Lama ..">
		</div>		
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Ganti">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>																	
	</form>
</div>

<?php 
include 'footer.php';

?>