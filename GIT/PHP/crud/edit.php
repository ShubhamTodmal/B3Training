<?php

function edit($id)
{
    $mo=$c=$co=$m='';
        if(isset($_GET['id']))
        {
         $id = $_GET['id'];
         if($id != '')
         {
           $s = fetchData($id);
        $show = pg_fetch_array($s);
            $mo = $show['modelno'];
            $c = $show['carname'];
            $co = $show['companyname'];
            $m = $show['milage'];
            $array = array($mo,$c,$co,$m);
        }
        else
        {   
             $array = array($mo,$c,$co,$m);
        }
        
    }
    return $array;
        }

?>