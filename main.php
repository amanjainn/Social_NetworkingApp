<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Bmsce Connections</title>
</head>
<body>
     <!-- Header -->
       <div class="row bg-dark text-light">
        <div class="col-sm-12">
        <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand headline-1 " href="#">

         <img src="images/logo1.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Bmsce Connections 
    </a>
</nav>
</div>
      </div>
      <div class="row pt-3">
        <div class= "col-sm-6" style="left:0.5%;">
        <img src="images/bg1.png" class="img-rounded opacity30" width="650px" height="565px">

		</div>
		<div class="col-sm-6" style="left:8%:">
			<img src="images/logo1.png" class="img-rounded" title="Coding cafe" width="80px" height="80px">
			<h2><strong>See what's happening in <br>  your college right now.</strong></h2><br><br>
			<h4><strong>Join BMSCE CONNECTIONS Today.</strong></h4>
			<form method="post" action="">
				<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
				<?php
					if(isset($_POST['signup'])){
						echo "<script>window.open('signup.php','_self')</script>";
					}
				?>
				<button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
				<?php
					if(isset($_POST['login'])){
						echo "<script>window.open('signin.php','_self')</script>";
					}
				?>
			</form>
    <div>
    <div>

</body>
</html>