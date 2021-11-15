<?php

    // regular Expression function

    $str = "the rain spain falls mainly on the plains";
    $pattern = "/falls/i";// here 'i' is used to make it case-insensitive
    echo preg_match($pattern,$str);// return if pattren found
    echo "<br>";

    echo preg_match_all("/ain/i",$str);//it return nunber of time the pattern found in string
    echo "<br>";

    echo preg_replace("/mainly/i","actually",$str);//it takes 3 para 1st))which pattern we want to replace 2nd)) to which pattern we want to replace 3rd)) our string
    //here we see mainly replace with actually and all bove function return the string
    echo "<br>".$str;// here we see we still got old string means expression function not mutate our string
    echo "<br>";


    echo preg_match_all("/[alc]/i",$str);//here we see it search for character in[] separatly and we have  5-a and 4-l and c-0 so it combine and give output as 9
    echo "<br>";

    echo preg_match_all("/[^al]/i",$str);// here it take count of all character that in strin axcept the 'a' and 'l' cause '^' in [] use to find pattern except character or word which followed by ^
    echo "<br>";

    echo preg_match("/plains$/i",$str);//here string or char followed to '$' use to search at end of our string
    echo "<br>";

    echo preg_match("/^e/i",$str);// and here '^' followed to string or char use to search at start/beginig
    //so here our e is not at start its at position 3 hence it print 0
    echo "<br>";
    
    // dont be confuse with [^hdv] and ^vv
    //here 1st one to search excepting this char
    //2nd for search at begining



?>