<!DOCTYPE html>
<html lang="en">
<head>
	<!-- This file operates the main page of our site-->
	<title>Main Page</title>
	<link rel="stylesheet" href="main_page.css">
</head>
<body>

<div class="user_info">

<?php
	#print user name
	session_start();
	echo "<h1>Current User: ". $_SESSION['username']."</h1>";
	$username = $_SESSION['username'];
?>

<!-- Logout Buttom -->
<form method="GET">
	<input type="submit" name="logout" value="logout" />
</form>

<?php
	#manage logout
	if(isset($_GET['logout'])){

		session_destroy();
		header('Location:login.html');

	}

?>

</div>

<!--File input form-->
<br>
<div class="file_form">
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" /> 
		<input name="uploadedfile" type="file" id="uploadfile_input" class="inputfile" required/>
	
	
		<input type="submit" value="Upload!" />
	
</form>
</div>


<div class="private_list">
<?php
	#display all files of the current user 
	echo "<strong>Your Files:</strong> <br>";

	$dir = "/srv/uploads/". $_SESSION['username'];

	if($file_list = scandir($dir,1)){

		$file_list = array_diff($file_list,array('..','.'));


		echo "<form action='view_file.php' method='GET'> \n";
		echo "<ul> \n";
		foreach($file_list as $filename){

			echo "<li> \n";
			echo sprintf("<input type='submit' value='%s' name='f'> \n", $filename, $filename);
			echo "</li> \n";
		}
		echo "</ul> \n";
		echo "</form> \n";

		
	}

	else{

		echo "Failed to scan files <br>";

	}

?>
</div>

<div class="public_list">
<?php

#display all published file
echo "<strong>Public Files:</strong> <br>";

	$dir = "/srv/uploads/publish";

	if($file_list = scandir($dir,1)){

		$file_list = array_diff($file_list,array('..','.'));

		

		echo "<form action='view_file_publish.php' method='GET'> \n";
		echo "<ul> \n";
		foreach($file_list as $filename){

			echo "<li> \n";
			echo sprintf("<input type='submit' value='%s' name='f'> \n", $filename, $filename);
			echo "</li> \n";

		}
		echo "</ul> \n";
		echo "</form> \n";

		
	}

	else{

		echo "Failed to scan files <br>";

	}

?>
</div>

 
</body>
</html>

