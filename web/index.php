<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pricone Data List Index</title>
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
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<h2 class="text-center">Pricone Data List</h2>

	<p class="text-center">Made with love by <a href="https://github.com/troke12">troke12</a></p>
	<hr>
		
	<table class="table table-striped table-bordered" style="width:100%">
		<thead class="thead-dark">
			<tr>
				<th>NO.</th>
				<th>FULL NAME</th>
				<th>INGAME NAME</th>
				<th>INGAME NAME SMALL</th>
				<th>INGAME JAPANESE NAME</th>
				<th>GUILD</th>
				<th>RACE</th>
				<th>AGE</th>
				<th>BIRTHDAY</th>
				<th>HEIGHT</th>
				<th>WEIGHT</th>
				<th>BLOOD TYPE</th>
				<th>HOBBIES</th>
				<th>AFFILIATION</th>
				<th>VOICE ACTOR</th>
				<th>VOICE ACTOR JAPANESE NAME</th>
				<th>OPSI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			mysqli_set_charset($koneksi, "utf8mb4");
			$sql = mysqli_query($koneksi, "SELECT * FROM characters ORDER BY id ASC") or die(mysqli_error($koneksi));
			if(mysqli_num_rows($sql) > 0){
				$no = 1;
				while($data = mysqli_fetch_assoc($sql)){
					echo '
					<tr>
						<td>'.$no.'</td>
						<td>'.$data['full_name'].'</td>
						<td>'.$data['ingame_name'].'</td>
						<td>'.$data['ingame_name_small'].'</td>
						<td>'.$data['ingame_jp_name'].'</td>
						<td>'.$data['guild'].'</td>
						<td>'.$data['race'].'</td>
						<td>'.$data['age'].'</td>
						<td>'.$data['birthday'].'</td>
						<td>'.$data['unit_height'].'</td>
						<td>'.$data['unit_weight'].'</td>
						<td>'.$data['blood_type'].'</td>
						<td>'.$data['hobbies'].'</td>
						<td>'.$data['affiliation'].'</td>
						<td>'.$data['va'].'</td>
						<td>'.$data['va_jp'].'</td>
						<td>
							<a href="edit.php?id='.$data['id'].'" class="badge badge-warning">Edit</a>
						</td>
					</tr>
					';
					$no++;
				}
			}else{
				echo '
				<tr>
					<td colspan="6">Tidak ada data.</td>
				</tr>
				';
			}
			?>
		<tbody>
	</table>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>