<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Publisher</title>
    </head>


    <?php

    session_start();
    require 'path_function.php';

    $fname = $_GET['f'];
    $uname = $_SESSION['username'];

    $from_path = get_path($uname, $fname);

    $to_path = "/srv/uploads/publish/".$fname;

    if (!copy($from_path, $to_path)) {
        echo "failed to publish file...\n";
    }else{
        header("Location:upload.php");
    }

    ?>

</html>
