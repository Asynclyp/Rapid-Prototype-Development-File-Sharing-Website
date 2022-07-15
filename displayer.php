<?php
session_start();

require_once 'path_function.php';

$filename = $_GET['f'];
$username = $_SESSION['username'];

$full_path = get_path($username, $filename);

//Get the MIME type of the file
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);

ob_clean();


//Set the Content-Type header to the MIME type of the file, and display the file.
header("Content-Type: ".$mime);
header('content-disposition: inline; filename="'.$filename.'";');
readfile($full_path);

?>