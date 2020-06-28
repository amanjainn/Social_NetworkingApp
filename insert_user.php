<?php
include("includes/connection.php");

	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$sem = htmlentities(mysqli_real_escape_string($con,$_POST['sem']));
		$branch = htmlentities(mysqli_real_escape_string($con,$_POST['u_branch']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		$birthday = htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
		$status = "verified";
		$posts = "no";
		$newgid = sprintf('%05d', rand(0, 999999));

		$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
		$check_username_query = "select user_name from users where user_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum of 9 characters!')</script>";
			exit();
		}

		$check_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($con,$check_email);

		$check = mysqli_num_rows($run_email);

        $domain = explode('@',$email)[1];
        if($domain != 'bmsce.ac.in'){
            echo "<script>alert('Please enter your college email address')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
      }
		if($check >0){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$rand = rand(1, 3); //Random number between 1 and 3

			if($rand == 1)
				$profile_pic = "head_red.png";
			else if($rand == 2)
				$profile_pic = "head_sun_flower.png";
			else if($rand == 3)
				$profile_pic = "head_turqoise.png";

		$insert = "insert into users (f_name,l_name,user_name,describe_user,sem,user_pass,user_email,user_branch,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)
		values('$first_name','$last_name','$username','Hello Coding Cafe.This is my default status!','$sem','$pass','$email','$branch','$gender','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','Iwanttoputading intheuniverse.')";
		
		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Well Done $first_name, you are good to go.')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
?>