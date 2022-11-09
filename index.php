<?php
	include 'koneksi.php';
	$jum_lantai = $con->query("SELECT MAX(floor_level) as max FROM floor");
	$jumlantai = $jum_lantai->fetch_array();
	$lantai = $jumlantai['max'];
	$jum_booth = $con->query("SELECT * FROM floor");
	$jumbooth = $jum_booth->num_rows;

	session_start();

	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="booth_styles/main.css">
	<title>Virtual Booth CMS</title>
	<?php include 'header.php'; ?>
</head>
<body>
	<div class='information'>
		<table>
			<tr>
				<td>Jumlah lantai</td>
				<td>:</td>
				<td><?php echo $lantai; ?></td>
			</tr>
			<tr>
				<td>Jumlah booth</td>
				<td>:</td>
				<td><?php echo $jumbooth; ?></td>
			</tr>
		</table>
	</div>
</body>
</html>