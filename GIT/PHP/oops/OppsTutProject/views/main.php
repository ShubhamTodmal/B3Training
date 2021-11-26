<!-- this is a view called by default as we pass it in core controller
	so to call home,users,shares view file we have to include them in main view-->
<!DOCTYPE html>
<html>
<head>
	<title>Website With PHP-Opps</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">-->
	<link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>


  <nav class="navbar navbar-default">
    <div class="container">
    	<div class="navbar-header">
      <a class="navbar-brand" href="#">ShareBoard</a>
  		</div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li>
            <a href='<?php echo ROOT_URL; ?>'>Home</a>
          </li>
          <li>
            <a href='<?php echo ROOT_URL; ?>shares'>Shares</a>
          </li>
        </ul>

         <ul class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['log_in'])): ?>
             <li>
            <a href='<?php echo ROOT_URL; ?>'>Welcome <?php echo $_SESSION['user_data']['name']; ?></a>
          </li>
          <li>
            <a href='<?php echo ROOT_URL; ?>users/logout'>Logout</a>
          </li>

          <?php else:?>
          <li>
            <a href='<?php echo ROOT_URL; ?>users/login'>Login</a>
          </li>
          <li>
            <a href='<?php echo ROOT_URL; ?>users/register'>Register</a>
          </li>
        <?php  endif; ?>
        </ul>

      </div>
    </div>
  </nav>



  <div class="container">
    
    <div class="row">
      <?php Messages::display(); ?>
  		<?php require($view); ?>  	
    </div>
  
  </div>
 </body>
 </html>