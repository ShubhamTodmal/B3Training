<?php 

function add(float $a,float $b)
{
    return $a+$b;
}

echo add(2.5,2.3);// here it gives result in float

    function add1(float $a,float $b) : int
    {
        return $a+$b;
        //return (int)($a+$b);we can use this one to
    }

    echo "<br>".add1(2.5,2.3);//here it gives result in int
    //just because we add int after function declaration our result get in integer


    //pass by reference
    function add2(&$a,&$b)
    {
        echo "<br>".$a+$b;
    }
    $x=2;$y=2;
    add2($x,$y);//here we pass integer x and y as arguments and then pass its reference in function defination

?>