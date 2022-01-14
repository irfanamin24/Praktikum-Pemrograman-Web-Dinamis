<!DOCTYPE html>
<html>
<head>
	<?php 
		session_start();
		include 'cek.php';
		include 'config.php';
	?>
	<title>RESPONSI PWEB</title>
	<link rel="shortcut icon" href="foto/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../MDB5/css/mdb.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-xl">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">WEBSITE PENJUALAN KUE</a>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="row">
			<?php 
			$use=$_SESSION['uname'];
			$fo=mysqli_query($koneksi, "select foto from admin where uname='$use'");
			while($f=mysqli_fetch_array($fo)){
				?>				

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php 
			}
			?>		
		</div>