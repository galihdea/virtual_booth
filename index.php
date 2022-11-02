<?php
	include 'koneksi.php';
	$jum_lantai = $con->query("SELECT MAX(floor_level) as max FROM floor");
	$jumlantai = $jum_lantai->fetch_array();
	$lantai = $jumlantai['max'];
	$jum_booth = $con->query("SELECT * FROM floor");
	$jumbooth = $jum_booth->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Virtual Booth CMS</title>
	<?php include 'header.php'; ?>
</head>
<body>
	<?php
		echo 'Jumlah Lantai: '.$lantai.'<br>';
		echo 'Jumlah VBooth: '.$jumbooth.'<br';
	?>
</body>
</html>