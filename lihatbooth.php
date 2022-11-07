<?php
	include 'koneksi.php';
	// $booth_id = $_GET['id'];
	// $booth_query = $con->query("SELECT * FROM floor WHERE id='$booth_id'");
	// $booth = $booth_query->fetch_array();

	$floor = $_GET['floor'];
	$booth_index = $_GET['booth'];

	$booth = $con->query("SELECT * FROM floor WHERE floor_level='$floor' AND booth_slot_index='$booth_index'")->fetch_array();

	$booth_type = null;
	$booth_text = null;
	$booth_image = null;
	$booth_video = null;

	if($booth != null){
		$booth_type = $booth['booth_type'];
		$booth_text = $booth['booth_text'];
		$booth_image = $booth['booth_image'];
		$booth_video = $booth['booth_video'];
	}

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
		<div class="booth_name">Booth <?php echo $floor.'.'.$booth_index?></div>
		
		<form method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Booth Type</td>
					<td>:</td>
					<td>
						<select name="booth_type">
							<option value="Anchor" <?php if ($booth_type=='Anchor') echo "selected";?>>Anchor</option>
							<option value="Bakery" <?php if ($booth_type=='Bakery') echo "selected";?>>Bakery</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Booth Text</td>
					<td>:</td>
					<td>
						<textarea name="booth_text"><?php echo $booth_text;?></textarea>
					</td>
				</tr>
				<tr>
					<td>Booth Image</td>
					<td>:</td>
					<td>
						<img src="<?php echo $booth_image;?>" style="width:480px;">
						<br>
						<input type="text" name="booth_image" value="<?php echo $booth_image;?>">
					</td>
				</tr>
				<tr>
					<td>Booth Video</td>
					<td>:</td>
					<td>
						<iframe width="480px" height="320px" src="<?php echo $booth_video;?>"></iframe>
						<br>
						<input type="text" name="booth_video" value="<?php echo $booth_video;?>">
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
	function getYoutubeEmbedUrl($url)
	{
	     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	    if (preg_match($longUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }

	    if (preg_match($shortUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }
	    return 'https://www.youtube.com/embed/' . $youtube_id ;
	}
?>

<?php
	if(isset($_POST['edit'])){
		$type = $_POST['booth_type'];
		$text = $_POST['booth_text'];
		$image = $_POST['booth_image'];
		$video = getYoutubeEmbedUrl($_POST['booth_video']);

		// $imagefile = $_FILES['booth_image']['name'];
		// $imagetmp = $_FILES['booth_image']['tmp_name'];
		// $folder_image = "booth_image/".$imagefile;
		// $videofile = $_FILES['booth_video']['name'];
		// $videotmp = $_FILES['booth_video']['tmp_name'];
		// $folder_video = "booth_video/".$videofile;

		if($booth != null){
			$con->query("UPDATE floor SET booth_type='$type',booth_text='$text',booth_image='$image',booth_video='$video' WHERE floor_level='$floor' AND booth_slot_index='$booth_index'");
		}
		else{
			$con->query("INSERT INTO floor(floor_level, booth_slot_index, booth_type, booth_text, booth_image, booth_video) VALUES ('$floor', '$booth_index', '$type', '$text', '$image', '$video')");
		}

		// $editbooth_query = $con->query("UPDATE floor SET booth_type='$type',booth_text='$text',booth_image='$imagefile',booth_video='$videofile' WHERE id='$booth_id'");

		// if(move_uploaded_file($imagetmp, $folder_image) && move_uploaded_file($videotmp, $folder_video)){
		// 	header("location:booth.php");
		// }

		header("location:booth.php");
	}
?>