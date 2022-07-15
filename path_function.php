<?php

function get_path($uname, $fname){
    
    if( !preg_match('/^[\w_\.\-]+$/', $fname) ){
        echo "Invalid filename";
        exit;
    } 

    if( !preg_match('/^[\w_\-]+$/', $uname) ){
        echo "Invalid username";
        exit;
    }

    $full_path = sprintf("/srv/uploads/%s/%s", $uname, $fname);

    return $full_path;

}


?>