<?php
#Store the file name in $fname
session_start();

$fname = $_GET['f'];
$username = $_SESSION['username'];

?>

<?php
echo "<h1 style=background-color:powderblue> Transfer $fname to?</h1><br>";
?>


<?php
# Choice the user to transfer file
$h = fopen("/srv/uploads/users.txt", "r");
    echo "<form action='mover.php'> \n";
    echo "<ul>";
    
    # Display other users
    while( !feof($h) ){
        $cur_name = trim(fgets($h));
        if($cur_name == $username){
            continue;
        }
        else{
            echo "<li> \n";
            echo sprintf("<input type='submit' value='%s' name='user'> \n", $cur_name, $cur_name);
            echo "</li> \n";
        }
    }
    #pass the file name to the next page
    echo sprintf("<input type='hidden' name='f' value='%s'>",$fname); 
    echo "</form> \n";
	echo "</ul> \n";

?>