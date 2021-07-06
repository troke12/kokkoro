<?php
//Koneksi database
$koneksi = mysqli_connect("localhost","user","","database");
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>