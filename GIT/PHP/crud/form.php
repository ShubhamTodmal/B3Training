<?php
    //include_once 'crud.php';
    include_once 'insert.php';
    //include_once 'edit.php';

         
        /*if(isset($_GET['id']))
        {
         $id = $_GET['id'];
           $s = fetchData($id);
        $show = pg_fetch_array($s);
            $mo = $show['modelno'];
            $c = $show['carname'];
            $co = $show['companyname'];
            $m = $show['milage'];
        }
        if($id == '')
        {   
             $mo = '';
                $c = '';
                $co = '';
                $m = '';
        }*/
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $val = edit($id); 
            //update($id,$modelno,$carname,$coname,$milage);
            
        }else {$val=['','','',''];}    
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Info</title>
    <link rel="stylesheet" href="Car2.css">
</head>
<body>

    <div class="row">
        <div class="col-lg-3">
            <h1>Add Car Details</h1><br>
        <form action="form.php?id=<?php echo $id;?>" method="post">

            <ul style="list-style:none;">

            <li>Car Model No.:</li>
            <li><input onchange="formValidation(this.id)" type="number" name="mno" id="mno" value="<?php echo $val[0];?>">
            <span style="color: red;" id = "mnov">*</span></li>
            

            <li>Car Name:</li>
            <li><input onchange="formValidation(this.id)" type="text" name="cname" id="cname"  value="<?php echo $val[1];?>" >
            <span style="color: red;" id = "cnamev">*</span></li>
            
            <li>Company name:</li>
            <li><input type="text" name="coname" id="coname"  value="<?php echo $val[2];?>" ></li>
            
            <li>Milage:</li>
            <li><input onchange="formValidation(this.id)" type="number" name="milage" id="milage"  value="<?php echo $val[3];?>" >
            <span style="color: red;" id = "milagev">*</span></li>
            
            <li><input type="submit" name="send"></li>

        </form>
    
            <span class="text-danger"><?php echo $msg;?></span>
    
    <br><br>
    </ul>
    <form action="form.php" action="post">
        <input type="search" name="search">
        <input type="submit" name="find">
    </form>
</div>

        


       <!-- <div class="col-lg-8" style="padding-left: 10%">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th>Sr. No.</th>
                    <th>Car Model No.<button class="btn" name="sort">^</button></th>
                    <th>Car Name</th>
                    <th>Company Name</th>
                    <th>Milage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_POST['sort']))
                    {
                         $s = fetchData();
                    }
                    else if(isset($_POST['sort']))
                    {
                       $s = "select * from car order by id";
                    }
                   
                    
                    while ($show = pg_fetch_array($s)) {
                     
                ?>
                    <tr class="text-center">
                    <td><?php echo $show['id']; ?></td>
                    <td><?php echo $show['modelno']; ?></td>
                    <td><?php echo $show['carname']; ?></td>
                    <td><?php echo $show['companyname']; ?></td>
                    <td><?php echo $show['milage']; ?></td>
                    <td><button class="btn-danger btn"><a href="delete.php?id=<?php echo $show['id'];?>">🗑</a></button>
                        <button class="btn-info btn" name="edit"><a href="form.php?id=<?php echo $show['id'];?>">📝</a></button>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>-->
        <?php  include_once 'display.php'; ?>
    </row>


<script src="Car2.js"></script>
</body>
</html>