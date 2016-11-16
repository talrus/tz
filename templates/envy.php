<?php
include_once('dbconfig.php');
include('header.html');
?>
<html>
	<head>
		<title>Envy</title>
	<script src = "../ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<form action ="" method = "post" enctype="multipart/form-data">
				<div class="col-xs-4">
					<input class="form-control" id="ex3" type="text" name = "txt-title" placeholder = "Title">
				</div>
				<div class="col-xs-4">
					<input class="form-control" id="ex3" type="text" name = "txt-desc" placeholder = "Description">
				</div>
				<div><textarea class = "ckeditor" name = "editor"></textarea></div>
				<div class="col-xs-6">
					<label class="btn btn-primary btn-lg btn-block">
					Load Image <input type="file" name="user_image" accept="image/*" style="display: none;">
					</label>
				</div>
				<div class ="col-xs-6">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
				</div>
				
			</form>
		</div>
		
	</body>
</html>
<?php
	if(isset($_POST['editor']))
	{
		$ptitle = trim($_POST['txt-title']);
		$pdesc = trim($_POST['txt-desc']);
		$text = $_POST['editor'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		$upload_dir = '../user_images/';
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
		$userpic = rand(1000,1000000).".".$imgExt;
		
		if(in_array($imgExt, $valid_extensions))
		{   
			if($imgSize < 5000000)    
			{
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			else
			{
				$errMSG = "Sorry, your file is too large.";
			}
		}
		else
		{
			$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
		}
		
		if(!isset($errMSG))
		  {
			try{
			$stmt = $DB_con->prepare("INSERT INTO posts(postCont, postTitle, postDesc, postDate, image) 
													   VALUES('$text','$ptitle', '$pdesc', now(), :upic)");
			$stmt->bindParam(':upic',$userpic);
			
			$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		  }
	
	}
	?>