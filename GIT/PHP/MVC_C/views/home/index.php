<div class="col-lg" style="padding-top: 5%">
        <div>
           <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>insert/add">Add Details</a>
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
                         <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <input type="submit" class="btn-link text-right" name="sortM" value="⬇">
                            <input type="submit" class="btn-link text-right" name="sortM" value="⬆">
                        </form>
                    </th>
                    <th class="text-center">Car Name<div>
                         <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <input type="submit" class="btn-link text-right" name="sortC" value="⬇">
                            <input type="submit" class="btn-link text-right" name="sortC" value="⬆">
                        </form></div>
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
                        <a class="btn btn-info" href="<?php echo ROOT_URL;?>update/edit/<?php echo $value['id'];?>">🖊</a>
                         <a class="btn btn-danger" href="<?php echo ROOT_URL;?>drop/delete/<?php echo $value['id'];?>">🗑</a>
                    </td>
                </tr>
                <?php $sr++;?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>