<?php
	include 'koneksi.php';
	$booth_id = $_GET['id'];
	$hapus_query = $con->query("UPDATE floor SET booth_type=NULL,booth_text=NULL,booth_image=NULL,booth_video=NULL WHERE id='$booth_id'");
	header("location: booth.php");
?>