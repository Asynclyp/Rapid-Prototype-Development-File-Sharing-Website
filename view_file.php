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

        echo "<h1 style=background-color:powderblue; display=in-line;> Manage ".$fname."</h1><br>";


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
        <form action="displayer.php" method = "GET">

            <input type="submit" name="display" value="display">

            <?php
            #pass the file name to the next page
            echo sprintf("<input type='hidden' name='f' value='%s'>", $fname);
            ?>

        </form>

        <!-- Transfer file to other users -->
        <form action="transfer.php" method = "GET"> 
            <input type="submit" name="transfer" value="transfer">
        
            <?php
            #pass the file name to the next page
            echo sprintf("<input type='hidden' name='f' value='%s'>",$fname); 
            ?>

        </form>


        <!-- Publish file to the shared place -->
        <form action="publish.php" method = "GET"> 
            <input type="submit" name="publish" value="publish">
        
            <?php
            #pass the file name to the next page
            echo sprintf("<input type='hidden' name='f' value='%s'>",$fname); 
            ?>

        </form>


        <?php

        #Process deletion

        if(isset($_GET['delete'])){

            delete_file($fname);

        }

        function delete_file($fn){

            
            $path = "/srv/uploads/". $_SESSION['username']."/".$fn;
            echo "Delete: ".$path;

            if(unlink($path)){

                header("Location: upload.php");

            }
            else{

                echo "Failed";
            }

        }

        ?>

        <?php

        #Process transfer

        if(isset($_GET['transfer'])){

            header("Location: transfer.php");

        }

        ?>
    </body>
</html>
