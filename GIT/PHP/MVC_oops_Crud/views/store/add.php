<div class="panel panel-default">
  <div class="panel-heading">
    <h1 class="panel-title">Add Car Details</h1>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    	<div class="form-group">
    		<label>Model No.:</label>&nbsp;&nbsp;<span style="color: red;">*</span>
    		<input type="number" name="modelno" class="form-control" value="<?php echo $viewmodel['modelno'];?>">
    	</div>
    	<div class="form-group">
    		<label>Car Name:</label>&nbsp;&nbsp;<span style="color: red;">*</span>
    		<input type="text" name="carname" class="form-control" value="<?php echo $viewmodel['carname'];?>">
    	</div>
    	<div class="form-group">
    		<label>Company Name:</label>
    		<input type="text" name="company" class="form-control" value="<?php echo $viewmodel['company'];?>">
    	</div>
    	<div class="form-group">
    		<label>Car Type:</label>&nbsp;&nbsp;<span style="color: red;">*</span>
    		<input type="text" name="ctype" class="form-control" value="<?php echo $viewmodel['ctype'];?>">
    	</div>
    	<div class="form-group">
    		<label>Car Milage:</label>
    		<input type="number" name="milage" class="form-control" value="<?php echo $viewmodel['milage'];?>">
    	</div>
        <?php if(empty($viewmodel['id'])): ?>
            <div class="form-group">
                <label>Car Foto:</label>
                <input type="file" name="photo" class="form-control">
            </div>
        <?php endif; ?>

    	<input type="submit" name="submit" class="btn btn-primary" value="submit">
    	<a class="btn btn-danger" href='<?php echo ROOT_PATH; ?>'>Cancel</a>
    </form>
  </div>
</div>