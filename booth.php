<?php
	include 'koneksi.php';
	
	$page = (isset($_GET['page']))?(int)$_GET['page']:1;
	$limit = 8;
	$start = ($page - 1) * $limit;

	$all_booth = $con->query("SELECT * FROM floor");
	$total_booth = $all_booth->num_rows;

	$total_pages = ceil($total_booth/$limit);
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
	<div class='content'>
		<?php 
			$cek_floor = $con->query("SELECT * FROM floor LIMIT ".$start.",".$limit);
			while($floor = $cek_floor->fetch_array()){
				$booth_id = $floor[0];
				if(($floor[3]==NULL)&&($floor[4]==NULL)&&($floor[5]==NULL)&&($floor[6]==NULL)){
					echo '<div class="booth_container" style="background-color:grey">';
				}
				else{
					echo '<div class="booth_container">';
				}
				echo '<div class="booth_name">Booth '.$floor[1].'.'.$floor[2].'</div>';
				echo '<a href="lihatbooth.php?id='.$booth_id.'">View</a> ';
				echo '<a href="hapusbooth.php?id='.$booth_id.'">Reset</a> ';
				echo '</div>';
			}
		?>
	
		<div class='floor_selection'>
			Floor Selection
			<?php
				for($i=1;$i<=$total_pages;$i++){
					if($i==$page){
						echo '<a class="selected">'.$i.'</a>';
					}
					else{
						echo '<a href="booth.php?page='.$i.'">'.$i.'</a>';	
					}
				}
				
				$cek_floor = $con->query("SELECT * FROM floor GROUP BY floor_level");
				$max_floor = 0;
				while($floor = $cek_floor->fetch_array()){
					//echo $floor[1].'<br>';
					if ($floor[1]>$max_floor){
						$max_floor = $floor[1];
					}
				}
				$addfloor = $max_floor + 1;
			?>
			<a class='button' href="addfloor.php?floor=<?=$addfloor?>">Add Floor</a>
		</div>
	</div>
</body>
</html>