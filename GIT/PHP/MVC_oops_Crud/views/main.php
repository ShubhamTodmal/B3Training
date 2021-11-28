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
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
</head>
<body>


  <nav class="navbar navbar-default">
    <div class="container">
    	<div class="navbar-header">
      <a class="navbar-brand" href="#">Crud(MVC-PHP_Oops)</a>
  		</div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li>
            <a href='<?php echo ROOT_URL; ?>'>Car List</a>
          </li>
          <li>
            <a href='<?php echo ROOT_URL; ?>store/add'>Add Cars</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    
    <div class="row">
      <?php Message::display(); ?>
  		<?php require($view); ?>  	
    </div>
  
  </div>
 </body>
 </html>