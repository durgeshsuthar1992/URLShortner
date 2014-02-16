<!DOCTYPE html5>
<html>
  <head lang="en">
	<meta charset="utf-8">
	<title>MyURLShortner</title>
	<meta name="author" content="Durgesh">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/docs.css" rel="stylesheet">
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">

  <!-- Navbar
      ================================================== -->
    <div class="navbar navbar-fixed-top">
     <div class="navbar-inner">
       <div class="container">
         <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </a>
         <a class="brand" href="#">URLShortner</a>
         
       </div>
     </div>
    </div>

        <div class="row">
          <div class="col-lg-12 offset1">
              	<form method="post" action="">
              		<h3>Give your long URL and I will make it short for you</h3>
                  <div class="form-group">
              		<input type="url" style="width:1000px;height:40px;" name="longURL" >
                  </div>
              		<input type="submit" class="btn btn-default" value="Short magic">
              	</form>
              	<div id="result">
                 <?php include('short.php'); ?>
                </div>
          </div> 
        </div>
  </body>