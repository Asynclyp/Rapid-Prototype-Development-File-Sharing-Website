<!DOCTYPE html>

<html lang="en">

    
    <head>
        <title>Calculator</title>
        <style>

            div{
                background-color: rgb(171, 206, 204);
                display: inline;
            }
            
            input[type=button], input[type=submit]{
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }

            input[type=number] {
                width: 20%;
                padding: 16px 0px;
                border: none;
                border-radius: 4px;
                background-color: #f1f1f1;
            }

        </style>
    </head>
    
    <body>

        <h1>Pascal's Float Caculator</h1>
        <strong>Support 3 decimal point (0.001).</strong>

        <form method="GET">
            
            <p>
                <label for="first_num">First input: </label>
                <input type="number" step="0.001" id="first_num" name="first_num" required>
            </p>
            
            <p>
                <label for="second_num">Second input: </label>
                <input type="number" step="0.001" id="second_num" name="second_num" required>
            </p>

            <p>
                <input type="radio" name="function" value="add" id="add" checked="checked">
                <label for="add">+</label>
                <input type="radio" name="function" value="sub" id="sub">
                <label for="sub">-</label>
                <input type="radio" name="function" value="mult" id="mult">
                <label for="mult">*</label>
                <input type="radio" name="function" value="divi" id="divi">
                <label for="divi">/</label>
            </p>

            <p>
                <input type="submit" name="submit" id="submit">
            </p>
            
        </form>

        <?php

            echo "<strong>This is the result:</strong> <br>";
            echo "<div>\n";

            $formula = "";
            
            #display the first input
            if( isset($_GET['first_num']) ){
                printf("<p> A = %.2f </p> \n", htmlentities($_GET['first_num']));
                $a = (float)$_GET['first_num'];
            }
            else{
                echo "First input missing!</br>";
                $a = NULL;
            }
            
            #display the second input
            if( isset($_GET['second_num']) ){
                printf("<p> B = %.2f </p> \n", htmlentities($_GET['second_num']));
                $b = (float)$_GET['second_num'];
            }
            else{
                echo "Second input missing!</br>";
                $b = NULL;
            }

            #display function
            if( isset($_GET['function']) ){
                printf("<p> Function = %s </p> \n", htmlentities($_GET['function']));
                $f = htmlentities($_GET['function']);
            }
            else{
                echo "Function input missing!</br>";
                $f = NULL;
            }

            if( (!is_null($a) && !is_null($b)) && !is_null($f) ){

                echo "<h1>";
                switch($f){
                    
                    case "add":
                        printf("A + B = %.2f", $a+$b);
                        break;
                    case "sub":
                        printf("A - B = %.2f", $a-$b);
                        break;
                    case "mult":
                        printf("A * B = %.2f", $a*$b);
                        break;
                    case "divi":
                        if($b==0){
                            printf("cannot divide by zero");
                            break;
                        }
                        else{
                            printf("A / B = %.2f", $a/$b);
                            break;
                        }
                    default:
                        echo "error";
                }
                echo "</h1>";

            }

            echo "</div>\n";



        ?>

    </body>
</html>
