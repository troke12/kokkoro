<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pricone Data List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Kokkoro</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Characters</h2>
		
		<hr>
		
		<?php
		session_start();
		if (!isset($_SESSION['username'])){
			header("Location: login.php");
		}
		echo "<p><a href='logout.php'>Logout</a></p>";
		if(isset($_POST['submit'])){
			$p1		= $_POST['c1'];
			$p2		= $_POST['c2'];
			$p3		= $_POST['c3'];
			$p4		= $_POST['c4'];
			$p5		= $_POST['c5'];
			$p6		= $_POST['c6'];
			$p7		= $_POST['c7'];
			$p8		= $_POST['c8'];
			$p9		= $_POST['c9'];
			$p10	= $_POST['c10'];
			$p11	= $_POST['c11'];
			$p12	= $_POST['c12'];
			$p13	= $_POST['c13'];
			$p14	= $_POST['c14'];
			$p15	= $_POST['c15'];
			mysqli_set_charset($koneksi, "utf8mb4");
			$cek = mysqli_query($koneksi, "SELECT * FROM characters WHERE ingame_name_small='$p3'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_prepare($koneksi, "INSERT INTO characters(full_name, ingame_name, ingame_name_small, ingame_jp_name, guild, race, age, birthday, unit_height, unit_weight, blood_type, hobbies, affiliation, va, va_jp) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") or die(mysqli_error($koneksi));
				mysqli_stmt_bind_param($sql, 'sssssssssssssss', $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15);
				mysqli_stmt_execute($sql);
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, nama characters sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FULL NAME</label>
				<div class="col-sm-10">
					<input type="text" name="c1" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME</label>
				<div class="col-sm-10">
					<input type="text" name="c2" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME SMALL</label>
				<div class="col-sm-10">
					<input type="text" name="c3" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME JAPANESE</label>
				<div class="col-sm-10">
					<input type="text" name="c4" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GUILD</label>
				<div class="col-sm-10">
					<input type="text" name="c5" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RACE</label>
				<div class="col-sm-10">
					<input type="text" name="c6" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">AGE</label>
				<div class="col-sm-10">
					<input type="text" name="c7" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BIRTHDAY</label>
				<div class="col-sm-10">
					<input type="text" name="c8" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HEIGHT</label>
				<div class="col-sm-10">
					<input type="text" name="c9" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">WEIGHT</label>
				<div class="col-sm-10">
					<input type="text" name="c10" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BLOOD</label>
				<div class="col-sm-10">
					<input type="text" name="c11" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HOBBIES (PAKE KOMA JIKA BANYAK)</label>
				<div class="col-sm-10">
					<input type="text" name="c12" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">AFFILIATION</label>
				<div class="col-sm-10">
					<input type="text" name="c13" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">VOICE ACTOR</label>
				<div class="col-sm-10">
					<input type="text" name="c14" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">VOICE ACTOR JAPANESE</label>
				<div class="col-sm-10">
					<input type="text" name="c15" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>