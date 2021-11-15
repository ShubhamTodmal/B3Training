<?php

    function staticEx(){

        static $x = 0;
        echo $x;
        $x++;

    }
staticEx();
staticEx();
staticEx();

// here we get that every time we call function instead of initiating x to 0 it increase it with old values
//means here x is not created newly every time we call function it pointing to defination of function intead of its call
// so here we increase x by one so as we increase number of call x increase its values
?>