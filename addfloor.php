<?php
	include 'koneksi.php';
	$new_floor = $_GET['floor'];
	for($i=1;$i<=8;$i++){
		$floor_add = $con->query("INSERT INTO floor (floor_level,booth_slot_index) VALUES ('$new_floor','$i')");
	}
	header("location: booth.php");
?>