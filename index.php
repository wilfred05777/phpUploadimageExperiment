<?php error_reporting();?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "photos");
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO image (filename) VALUES ('$filename')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
  $result = mysqli_query($db, "SELECT * FROM image");
?>

<?php 
	// $msg ="";

	// if(isset($_POST['upload'])){

	// 	$filename = $_FILES["uploadfile"]["name"];
	// 	$tempname = $_FILES["uploadfile"]["tmp_name"];
	// 		$folder = "image/".$filename;

	// 	$db = mysqli_connect("localhost", "root", "", "photos");

	// 		//Get all the sumbmitted data from the form
	// 		$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// 		// Execute query
	// 		mysqli_query($db, $sql);

	// 		//
	// 		if(move_uploaded_file($tempname, $folder)){
	// 			$msg = "Image uploaded successfully";
			
	// 		} else{
	// 			$msg = "Failed to upload image";
	// 		}

	// }
	// // $result = mysqli_query($db, "SELECT * FROM image");
	// $result = mysqli_query($db, "SELECT * FROM image");

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload Image in PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<h2>UPload an image</h2>
    <div id="content">
      <form method="POST"
		action=""
		enctype="multipart/form-data">
			<input 
				type="file"
				name="uploadfile"
				value=""
			/>
			<div>
				<button type="submit"
				name="upload"
				>UPLOAD</button>
			</div>
		</form>
    </div>
</body>
</html>