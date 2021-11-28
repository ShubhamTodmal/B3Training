<?php $sort=array('modelnoA','modelnoD','carnameA','carnameD'); ?>
<div class="col-lg" style="padding-top: 5%">
        <div>
           <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>store/add">Add Details</a>
           <ul class="nav navbar-nav navbar-right">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input type="search" name="search_data">
                <input type="submit" name="search" class="btn btn-info" value="Search">
                </form>
            </ul>
        </div>
        <div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Sr. No.</th>
                    <th class="text-center">Car Model No.
                        <a class="text-right" href="<?php echo ROOT_PATH;?>home/index/<?php echo $sort[0];?>">⬇</a>
                        <a class="text-right" href="<?php echo ROOT_PATH;?>home/index/<?php echo $sort[1];?>">⬆</a>
                    </th>
                    <th class="text-center">Car Name
                        <a class="text-right" href="<?php echo ROOT_PATH;?>home/index/<?php echo $sort[2];?>">⬇</a>
                        <a class="text-right" href="<?php echo ROOT_PATH;?>home/index/<?php echo $sort[3];?>">⬆</a>
                    </th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Car Type</th>
                    <th class="text-center">Milage</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr = 1;?>
                <?php foreach ($viewmodel as $value) : ?>
                    
                <tr class="text-center">
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $value['modelno']; ?></td>
                    <td><?php echo $value['carname']; ?></td>
                    <td><?php echo $value['company']; ?></td>
                    <td><?php echo $value['ctype']; ?></td>
                    <td><?php echo $value['milage']; ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo ROOT_URL;?>store/add/<?php echo $value['id'];?>">🖊</a>
                         <a class="btn btn-danger" href="<?php echo ROOT_URL;?>store/delete/<?php echo $value['id'];?>">🗑</a>
                    </td>
                </tr>
                <?php $sr++;?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>