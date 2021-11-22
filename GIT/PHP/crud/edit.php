<?php

function edit($id)
{
        if(isset($_GET['id']))
        {
         $id = $_GET['id'];
           $s = fetchData($id);
        $show = pg_fetch_array($s);
            $mo = $show['modelno'];
            $c = $show['carname'];
            $co = $show['companyname'];
            $m = $show['milage'];
            $array = array($mo,$c,$co,$m);
        }
        if($id == '')
        {   
             $array = array($mo,$c,$co,$m);
        }
        return $array;
    }

?>