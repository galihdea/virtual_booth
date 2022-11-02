<?php
	include 'koneksi.php';
	$booth_id = $_GET['id'];
	$booth_query = $con->query("SELECT * FROM booth WHERE booth_id='$booth_id'");
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
				<option value="Anchor">Anchor</option>
				<option value="Bakery">Bakery</option>
			</select>
		</div>
		<div>
			<label>Booth Text</label><br>
			<textarea disabled></textarea>
		</div>
		<div>
			<label>Booth Image</label><br>
			<input type="file" name="booth_image">
		</div>
		<div>
			<label>Booth Video</label><br>
			<input type="" name="booth_video">
		</div>
		<div>
			<button>Back</button>
		</div>
	</form>
</body>
</html>