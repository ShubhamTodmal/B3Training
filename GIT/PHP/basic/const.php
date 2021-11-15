<?php

    ///////  Constant cant change its value after declaration
    //constant are global by default

    define('greet','good mornig');
    echo greet;//this is how we declare constatnt in php
    //echo Greet;// it gives error cause its case-sensetive


    //to make it insensitive
//    define("me",'shubham',true);//here 3rd argument true makes variable case insensitive
//    echo ME;
    //still we get error cause now it not supported 3rd arguments


    ////////// Array
        define('car',['s','c','e']);//making array constant
        echo car;//it gives type
        print car;//it gives type
        echo "<br>".car[0];//it gives 1st value
        print "<br>".car[2]."<br>";//it gives 3rd value


        function greeting(){
            echo greet;
        }
        greeting();//it work cause its global
   


?>