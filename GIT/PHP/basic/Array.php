<?php

        $car = array('a','b','c');
        $car2 = ['w','e','r'];

        echo count($car);//it gives count of arrays value

        //      index array
        echo $car[0]."<br>";//it gives 1st element
        //looping in index array
        for($x=0;$x<count($car);$x++)
        {
            echo $car[$x]."<br>";
        }

        

        //      Assosiative array
        $age = array('aet'=>56,'sand'=>78,'candi'=>12);//this is assosiative array
        echo $age['aet'];//it gives value of key we pass in age array
        // looping in assosiative array
        foreach($age as $x)//if one var pass it erturn value
        {
            echo $x."<br>";//here it gives values
        }
        foreach($age as $x=>$x_val)// if 2 var pass like this it return 1st key and then 2nd is its value
        {
            echo "key:$x value:$x_val<br>";//here it gives values
        }



        //      sorting indexing array
                // Ascending order
                    sort($car2);
                    foreach($car2 as $c)
                    {
                        echo "$c<br>";
                    }
               
                // Descending order
                rsort($car2);
                foreach($car2 as $c)
                {
                    echo "$c<br>";
                }


                echo "<br><br>";
        //      Sorting Assosiative array
                // Ascending order with value
                asort($age);
                foreach($age as $a)
                {
                    echo "$a<br>";
                }
            
                // Descending order with value
                arsort($age);
                foreach($age as $c)
                {
                    echo "$c<br>";
                }
                echo "<br>";
                // Ascending order with key
                ksort($age);
                foreach($age as $a)
                {
                    echo "$a<br>";
                }
            
                // Descending order with key
                krsort($age);
                foreach($age as $c)
                {
                    echo "$c<br>";
                }


?>