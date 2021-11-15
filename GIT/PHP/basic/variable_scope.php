<?php

    $x = 5;

    function Gscope(){
        echo "Local scope of x: $x";// here we cant access x cause its a global scope hence it only access outside function
    }

    function Lscope(){
        $y = 6;
        echo "Local Scope of y: $y";
    }

    Gscope();
    echo "<br/>global scope of x: $x<br/><br/>";

    Lscope();
    echo "<br/>global scope of y: $y<br/><br/>";// here it gives error cause y is inside function so its a local scope and cant access outside of that function


    $a=2;$b=1;
    function add(){
        global $a,$b;
        $b= $a+$b;
        echo "Addition is: $b<br/>";
        }
        add();
        echo $b.'<br/><br/>';//here we see function add and variable y gives same output cause we declare them as global so we can access them from any where and it mutate itself



        function add2(){
            $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
            echo "Addition2 is :". $GLOBALS['b'].'<br/>';
        }
        add2();
        echo $b;//here we see its same as add 

        //so we can use global key word or $GLOBALS[] array to declare variable global
?>