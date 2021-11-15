<?php

$x=20;$y=10;
        // Gloabals Variable
                // php store all global variable in array GLOBAL[index]
            function add()
            {
                $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
                echo $GLOBALS['z'];
            }
            add();//here we define 3 var as global then print addition of 2 in 1
            echo $z;// now here we call that result var separatly still it accessible cause wherevenr we declare Gloabal to var it is asseccible anywhere in function outof funciton



        // Server Variable
            //it is super global varibale it store info of header,paths and scripts location
            echo "<BR>".$_SERVER['PHP_SELF'];//HERE WE GOT current FILE LOCATION
            echo "<BR>".$_SERVER['SERVER_NAME'];//ITS GIVES OUR SERVER NAME HERE WE USE "LOCALHOST"
            echo "<BR>".$_SERVER['HTTP_HOST'];//ITS GIVES OUR HOSTING PROTOCOL
            echo "<BR>".$_SERVER['HTTP_REFERER'];//ITS GIVES URL OF CURRENT SCRIPT
            echo "<BR>".$_SERVER['HTTP_USER_AGENT'];
            echo "<BR>".$_SERVER['SCRIPT_NAME'];//IT GIVES CURRENT SCRITP NAME WITH FOLDER 
            echo "<BR>".$_SERVER['SCRIPT_FILENAME'];//IT GIVES ABSOLUTE PATH OF CURRENT FILE
            echo "<BR>".$_SERVER['REMOTE_ADDR'];//GIVES IP ADDRESS FROM WHERE USER VIEWING THIS CURRENT PAGE
       
?>



<br><br><br><br>
<!--// Request varaibles
            // it also a super global varibale
            // it collect data after submitting html form 
        -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
            </head>
            <body>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post"><!-if we use post here data is not show in url if get use then data shown in url
                // here if define both methos still it take get only and run for it only even if we pass it after post or before post -->
                    name:<input type = "text" name="fname">
                    <input type="submit">
                    <?php
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            $name = $_REQUEST['fname'];//here we use request variable which convert see which mwthod we use and pass data according to it
                            //but request var aslo has a variable cookies if we have same name in our form and in cookie it will halt the data or cookie ovveride form data and we get wrong input or error
                            //hence we prefer post instead of request
                            if(empty($name))
                            {
                                echo "name is empty";
                            }else echo $name;
                        }
                    ?>
                </form>
            </body>
            </html>