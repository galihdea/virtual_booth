<?php
	include 'koneksi.php';
	$booth_id = $_GET['id'];
	$booth_query = $con->query("SELECT * FROM floor WHERE id='$booth_id'");
	$booth = $booth_query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method=POST action="booth.php">
		<div>
			<label>Booth Type</label><br>
			<select name="booth_type" disabled>
				<option value="Anchor" <?php if ($booth['booth_type']=='Anchor') echo "selected";?>>Anchor</option>
				<option value="Bakery" <?php if ($booth['booth_type']=='Bakery') echo "selected";?>>Bakery</option>
			</select>
		</div>
		<div>
			<label>Booth Text</label><br>
			<textarea disabled><?php echo $booth['booth_text'];?></textarea>
		</div>
		<div>
			<label>Booth Image</label><br>
			<img src="booth_image/<?php echo $booth['booth_image'];?>">
		</div>
		<div>
			<label>Booth Video</label><br>
			<video width="480" height="320" controls>
				<source src="<?php echo "booth_video/".$booth['booth_video'];?>" type="video/mp4">
			</video>
		</div>
		<div>
			<button>Back</button>
		</div>
	</form>
</body>
</html>