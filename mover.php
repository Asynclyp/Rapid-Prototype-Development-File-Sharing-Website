<?php
session_start();
require_once 'path_function.php';

$fname = $_GET['f'];
$from = $_SESSION['username'];
$to = $_GET['user'];

# Set paths
$old_path = sprintf("/srv/uploads/%s/%s", $from, $fname);
$old_path = get_path($from, $fname);
$path = sprintf("/srv/uploads/%s/%s", $to, $fname);
$path = get_path($to, $fname);

# Move file from the user to the destination dir
if( rename($old_path, $path) ) {  
    echo "Success";  
    header('Location:upload.php');
}  
else {  
    echo "Failed";  
} 

?>
