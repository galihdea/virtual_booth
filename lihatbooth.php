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
	<link rel="stylesheet" type="text/css" href="booth_styles/main.css">
	<title>Virtual Booth CMS</title>
	<?php include 'header.php'; ?>
</head>
<body>
	<div class="content">
		<div class="booth_name">Booth <?php echo $booth['floor_level'].'.'.$booth['booth_slot_index'];?></div>
		
		<form method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Booth Type</td>
					<td>:</td>
					<td>
						<select name="booth_type">
							<option value="Anchor" <?php if ($booth['booth_type']=='Anchor') echo "selected";?>>Anchor</option>
							<option value="Bakery" <?php if ($booth['booth_type']=='Bakery') echo "selected";?>>Bakery</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Booth Text</td>
					<td>:</td>
					<td>
						<textarea name="booth_text"><?php echo $booth['booth_text'];?></textarea>
					</td>
				</tr>
				<tr>
					<td>Booth Image</td>
					<td>:</td>
					<td>
						<img src="booth_image/<?php echo $booth['booth_image'];?>" style="width:480px;">
						<br>
						<input type="file" name="booth_image">
					</td>
				</tr>
				<tr>
					<td>Booth Video</td>
					<td>:</td>
					<td>
						<video width="480px" height="320px" controls>
							<source src="<?php echo "booth_video/".$booth['booth_video'];?>" type="video/mp4">
						</video>
						<br>
						<input type="file" name="booth_video">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<a href="booth.php">Cancel</a>
						<button type="submit" name="edit">Submit</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
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

		$editbooth_query = $con->query("UPDATE floor SET booth_type='$type',booth_text='$text',booth_image='$imagefile',booth_video='$videofile' WHERE id='$booth_id'");

		if(move_uploaded_file($imagetmp, $folder_image) && move_uploaded_file($videotmp, $folder_video)){
			header("location:booth.php");
		}
	}
?>