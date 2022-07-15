<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mange File</title>
        <link rel="stylesheet" href="main_page.css">
    </head>
    <body>

        
        <?php
        #Store the file name in $fname
        session_start();

        $fname = $_GET['f'];
        $p = $_GET['p'];

        echo "<h1 style=background-color:powderblue> Manage ".$fname."</h1><br>";


        ?>

        <a href="upload.php">Back</a></br></br>

        
        <!-- Delete the file -->
        <form method = "GET">
            
            <input type="submit" name="delete" value="delete">

            <?php
            #pass the file name to the next page
            echo sprintf("<input type='hidden' name='f' value='%s'>", $fname);
            ?>

        </form>


        <!-- Display the file -->
        <form method = "GET">

            <input type="submit" name="display" value="display">

            <?php
            #pass the file name to the next page
            echo sprintf("<input type='hidden' name='f' value='%s'>", $fname);
            ?>

        </form>



        <?php

        #Process deletion

        if(isset($_GET['delete'])){

            delete_file($fname);

        }

        function delete_file($fn){

            
            $path = "/srv/uploads/publish/".$fn;
            echo "Delete: ".$path;

            if(unlink($path)){

                header("Location: upload.php");

            }
            else{

                echo "-----Failed";
            }

        }

        ?>

        <?php

        #Process display

        if(isset($_GET['display'])){

            require_once 'path_function.php';

            $filename = $_GET['f'];

            $full_path = "/srv/uploads/publish/".$filename;

            //Get the MIME type of the file
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($full_path);

            ob_clean();

            //Set the Content-Type header to the MIME type of the file, and display the file.
            header("Content-Type: ".$mime);
            header('content-disposition: inline; filename="'.$filename.'";');
            readfile($full_path);

        }

        ?>

    </body>
</html>
