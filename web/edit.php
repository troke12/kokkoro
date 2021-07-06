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
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Characters</h2>
		
		<hr>
		
		<?php
		session_start();
		if (!isset($_SESSION['username'])){
			header("Location: login.php?r=edit");
		}
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			mysqli_set_charset($koneksi, "utf8mb4");
			$select = mysqli_query($koneksi, "SELECT * FROM characters WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		if(isset($_POST['delete'])){
			$hapus = mysqli_query($koneksi, "DELETE FROM characters WHERE id='$id'") or die(mysqli_error($koneksi));
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}
		?>
		
		<?php
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
			
			$sql = mysqli_prepare($koneksi, "UPDATE characters SET full_name=?, ingame_name=?, ingame_name_small=?, ingame_jp_name=?, guild=?, race=?, age=?, birthday=?, unit_height=?, unit_weight=?, blood_type=?, hobbies=?, affiliation=?, va=?, va_jp=? WHERE id=?") or die(mysqli_error($koneksi));
			mysqli_stmt_bind_param($sql, 'sssssssssssssssd', $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $id);
			mysqli_stmt_execute($sql);
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FULL NAME</label>
				<div class="col-sm-10">
					<input type="text" name="c1" class="form-control" value="<?php echo $data['full_name']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME</label>
				<div class="col-sm-10">
					<input type="text" name="c2" class="form-control" value="<?php echo $data['ingame_name']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME SMALL</label>
				<div class="col-sm-10">
					<input type="text" name="c3" class="form-control" value="<?php echo $data['ingame_name_small']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INGAME NAME JAPANESE</label>
				<div class="col-sm-10">
					<input type="text" name="c4" class="form-control" value="<?php echo $data['ingame_jp_name']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GUILD</label>
				<div class="col-sm-10">
					<input type="text" name="c5" class="form-control" value="<?php echo $data['guild']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RACE</label>
				<div class="col-sm-10">
					<input type="text" name="c6" class="form-control" value="<?php echo $data['race']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">AGE</label>
				<div class="col-sm-10">
					<input type="text" name="c7" class="form-control" value="<?php echo $data['age']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BIRTHDAY</label>
				<div class="col-sm-10">
					<input type="text" name="c8" class="form-control" value="<?php echo $data['birthday']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HEIGHT</label>
				<div class="col-sm-10">
					<input type="text" name="c9" class="form-control" value="<?php echo $data['unit_height']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">WEIGHT</label>
				<div class="col-sm-10">
					<input type="text" name="c10" class="form-control" value="<?php echo $data['unit_weight']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BLOOD</label>
				<div class="col-sm-10">
					<input type="text" name="c11" class="form-control" value="<?php echo $data['blood_type']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HOBBIES (PAKE KOMA JIKA BANYAK)</label>
				<div class="col-sm-10">
					<input type="text" name="c12" class="form-control" value="<?php echo $data['hobbies']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">AFFILIATION</label>
				<div class="col-sm-10">
					<input type="text" name="c13" class="form-control" value="<?php echo $data['affiliation']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">VOICE ACTOR</label>
				<div class="col-sm-10">
					<input type="text" name="c14" class="form-control" value="<?php echo $data['va']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">VOICE ACTOR JAPANESE</label>
				<div class="col-sm-10">
					<input type="text" name="c15" class="form-control" value="<?php echo $data['va_jp']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<input type="submit" name="delete" class="btn btn-danger" value="DELETE">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>