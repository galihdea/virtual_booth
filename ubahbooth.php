<?php
	include 'koneksi.php';
	$booth_id = $_GET['id'];
	$booth_query = $con->query("SELECT * FROM floor WHERE id='$booth_id'");
	$booth = $booth_query->fetch_array();
	//echo $booth['booth_image'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="booth_styles/main.css">
	<title></title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<div>
			<label>Booth Type</label><br>
			<select name="booth_type">
				<option value="Anchor" <?php if ($booth['booth_type']=='Anchor') echo "selected";?>>Anchor</option>
				<option value="Bakery" <?php if ($booth['booth_type']=='Bakery') echo "selected";?>>Bakery</option>
			</select>
		</div>
		<div>
			<label>Booth Text</label><br>
			<textarea name="booth_text"><?php echo $booth['booth_text'];?></textarea>
		</div>
		<div>
			<label>Booth Image</label><br>
			<input type="file" name="booth_image" value="<?php echo 'booth_image/'.$booth['booth_image'];?>">
		</div>
		<div>
			<label>Booth Video</label><br>
			<input type="file" name="booth_video" value="<?php echo 'booth_video/'.$booth['booth_video'];?>">
		</div>
		<div>
			<button type="submit" name="edit">Edit</button>
		</div>
	</form>
</body>
</html>
<?php
	if(isset($_POST['edit'])){
		$type = $_POST['booth_type'];
		$text = $_POST['booth_text'];
		$imagefile = $_FILES['booth_image']['name'];
		$imagetmp = $_FILES['booth_image']['tmp_name'];
		$folder_image = "booth_image/".$imagefile;
		$videofile = $_FILES['booth_video']['name'];
		$videotmp = $_FILES['booth_video']['tmp_name'];
		$folder_video = "booth_video/".$videofile;

		$editbooth_query = $con->query("UPDATE floor SET booth_type='$type',booth_text='$text',booth_image='$imagefile',booth_video='$videofile' WHERE booth_id='$booth_id'");

		if(move_uploaded_file($imagetmp, $folder_image) && move_uploaded_file($videotmp, $folder_video)){
			header("location:booth.php");
		}
	}
?>