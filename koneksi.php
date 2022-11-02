<?php
	$servername = "localhost";
	$database = "virtual_booth";
	$username = "root";
	$password = "";
 
	$con = mysqli_connect($servername, $username, $password, $database);
	// mengecek koneksi
	if (!$con) {
    	die("Koneksi gagal: " . mysqli_connect_error());
	}
	//echo "Koneksi berhasil";
	//mysqli_close($con);
?>