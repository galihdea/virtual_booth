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
		$max_floor = 0;
		$cek_floor = $con->query("SELECT * FROM floor GROUP BY floor_level");
		while($floor = $cek_floor->fetch_array()){
			echo $floor[1].'<br>';
			if ($floor[1]>$max_floor){
				$max_floor = $floor[1];
			}
		}
		$addfloor = $max_floor + 1;
	?>
	<a href="addfloor.php?floor=<?=$addfloor?>">Add Floor</a>
</body>
</html>