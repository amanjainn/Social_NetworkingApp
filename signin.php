<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/signinstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
	<div class="col-sm-12 bg-dark">
		<div class="text-primary">
			<center><h1 style="color: white;">Bmsce Connections</h1></center>
		</div>
	</div>
</div>
<div class="row pt-4">
	<div class="col-sm-12">
		<div class="main-content pb-4 mb-4">
			<div class="header">
				<h3 style="text-align: center;"><strong>Login to Bmsce Connections</strong></h3>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					<div class="overlap-text">
						<input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md"><br>
						<a style="text-decoration:none;float: right;color: #187FAB;" data-toggle="tooltip" title="Reset Password" href="forgot_password.php">Forgot?</a>
					</div>
					<a style="margin-top: 15px;text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Create Account!" href="signup.php">Don't have an account?</a><br><br>

					<center><button id="signin" class="btn btn-info btn-lg mt-3" name="login">Login</button></center>
					<?php include("login.php"); ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>