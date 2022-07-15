<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Uploader</title>
	</head>
	<body>
	
	<?php

		require 'path_function.php';

		session_start();
		
		$full_path = get_path($_SESSION['username'], $_FILES['uploadedfile']['name']);
		
		echo "User: ". $_SESSION['username']."<br>";

		if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
			echo "success";
			header("Location: upload.php");
			exit;
		}else{
			echo "failed";
			exit;
		}
	?>
	</body>
</html>

