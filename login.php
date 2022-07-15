<!DOCTYPE html>
<?php
    session_start();
    
    $user_name = $_GET["user"];
    
    #Sanity check on username input
    if( !preg_match('/^[\w_\-]+$/', $user_name) ){
        echo "Invalid username";
        exit;
    }

    echo "Your username:". $user_name. "</br>";
    
    $_SESSION['username'] = $user_name;
    
    $h = fopen("/srv/uploads/users.txt", "r");
    $valid = 0;

    #Check if username exist
    while( !feof($h) ){
        $cur_name = trim(fgets($h));
        if($user_name == $cur_name){
            $valid = 1;
            break;
        }
    }

    if($valid == 1){
        echo "Successful Login :) </br>";
        header("Location: upload.php");
    }
    else{
        echo "User Name Not Found :( </br>";
    }

     
?>
<html lang="en">

<head>
    <title>Login Error</title>
</head>
<body>
    <a href="login.html">Try again</a>
</body>

</html>

