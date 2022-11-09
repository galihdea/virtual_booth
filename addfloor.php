<?php
	include 'koneksi.php';

	// $new_floor = $_GET['floor'];
	// for($i=1;$i<=8;$i++){
	// 	$floor_add = $con->query("INSERT INTO floor (floor_level,booth_slot_index) VALUES ('$new_floor','$i')");
	// }

	session_start();

	$_SESSION["total_floor"] = ($con->query("SELECT MAX(floor_level) FROM floor")->fetch_array()[0])+1;

	header("location: booth.php");
?>