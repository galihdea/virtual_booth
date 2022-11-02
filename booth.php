<?php
	include 'koneksi.php';
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
		$num = 1;
		$cek_floor = $con->query("SELECT * FROM floor");
		while($floor = $cek_floor->fetch_array()){
			$booth_id = $floor[0];
			echo $num.' '.$floor[1].' '.$floor[2].' '.$floor[3].' '.$floor[4].' '.$floor[5].' ';
			echo '<a href="lihatbooth.php?id='.$booth_id.'">Lihat Booth</a> ';
			echo '<a href="ubahbooth.php?id='.$booth_id.'">Ubah Booth</a> ';
			echo '<a href="hapusbooth.php?id='.$booth_id.'">Hapus Isi Booth</a> ';
			echo '<br />';
			$num++;
		}
	?>
</body>
</html>