

<div class="col-lg-8" style="padding-left: 10%">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th>Sr. No.</th>
                    <th><a href="?sort=modelno">^</a> Car Model No.</th>
                    <th><a href="?sort=carname">^</a>Car Name</th>
                    <th>Company Name</th>
                    <th>Milage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $order = '';

                     if(isset($_GET['sort']))
                     {
                        $order = $_GET['sort'];
                        // $sql = "select * from car order by ".$order; 
                        if($order == 'modelno')
                        {
                            $s = sortbym();  
                        }
                        if($order == 'carname')
                        {
                            $s = sortbyc();
                        }
                        //echo $order;
                     }
                     else
                        if(isset($_GET['search']))
                     {
                        $order = $_GET['search'];
                        if($order == '')
                        {
                              $s = fetch();
                        }
                        else{
                            //$sql = "select * from car where modelno= ".$order;
                            $s = fetch($order);
                        }
                     }
                     else
                     {
                            $s = fetch();
                    }
                            
                    while ($show = pg_fetch_array($s)) {
                        //print_r($show);
                     
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
        </div>