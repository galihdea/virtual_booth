<?php
	include 'koneksi.php';
	// $booth_id = $_GET['id'];
	// $hapus_query = $con->query("UPDATE floor SET booth_type=NULL,booth_text=NULL,booth_image=NULL,booth_video=NULL WHERE id='$booth_id'");

	$floor = $_GET['floor'];
	$booth_index = $_GET['booth'];

	$con->query("DELETE FROM floor WHERE floor_level='$floor' AND booth_slot_index='$booth_index'");

	header("location: booth.php");
?>
