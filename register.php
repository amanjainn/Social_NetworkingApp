<?php
session_start();
$con = mysqli_connect("localhost","root","","bmsce_talks");

if(mysqli_connect_errno()){
    echo "Failed to connect " . mysqli_connect_errno();
}

// Variables declaration
$fname =""; //First name
$lname =""; //last name
$em =""; //email
$em2 =""; //email2
$password =""; //password
$password2 =""; //password2
$date =""; //Sign up date
$error_array = array(); //Holds error messages

if(isset($_POST['reg_button'])){

  //  First Name
   $fname = strip_tags($_POST['reg_fname']); //Remove html tags
   $fname = str_replace(' ', '',$fname); //Remove spaces
   $fname= ucfirst(strtolower($fname)); // Uppercase first letter
   $_SESSION['reg_fname'] =$fname; //Stores first name

  //  Last Name
  $lname = strip_tags($_POST['reg_lname']); //Remove html tags
  $lname = str_replace(' ', '',$lname); //Remove spaces
  $lname= ucfirst(strtolower($lname)); // Uppercase first letter
  $_SESSION['reg_lname'] =$fname; //Stores first name


  //  Email
  $em = strip_tags($_POST['reg_email']); //Remove html tags
  $em = str_replace(' ', '',$em); //Remove spaces
  $em= ucfirst(strtolower($em)); // Uppercase first letter
   $_SESSION['reg_email'] =$fname; //Stores first name


  //  Email
  $em2 = strip_tags($_POST['reg_email2']); //Remove html tags
  $em2 = str_replace(' ', '',$em2); //Remove spaces
  $em2 = ucfirst(strtolower($em2)); // Uppercase first letter
  $_SESSION['reg_email2'] =$fname; //Stores first name


  //  Password
  $password = strip_tags($_POST['reg_password']); //Remove html tags
  $password2 = strip_tags($_POST['reg_password2']); //Remove html tags
 
  $date = date("Y-m-d"); //Current date

  // Email validation
   if($em==$em2){
    $domain = explode('@',$em)[1];
    if($domain != 'bmsce.ac.in'){
    echo('This domain of email address is not allowed!') ;
  }
  // Check for dupliates email
  $e_check = mysqli_query($con,"SELECT email from users where email='$em'");

  //  Count the number of rows returned
  $nums_rows= mysqli_num_rows($e_check);

  if($nums_rows>0){
    array_push($error_array, "Email already in use<br>");
  }

   }else{
    array_push($error_array, "Emails don't match<br>");
   }

   if(strlen($fname)>25 || strlen($fname)<2){
    array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
   }

   if(strlen($lname)>25 || strlen($lname)<2){
    array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
   }
  
   if($password!=$password2){
    array_push($error_array,  "Your passwords do not match<br>");
   } 
   else if(preg_match('/[^A-Za-Z0-9]/',$password)){
      array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
     

  
   if(strlen($password)>30 || strlen($password)<5){
    array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
   }
   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
      <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" 
        value=<?php
        if(isset($_SESSION['reg_fname'])){
          echo $_SESSION['reg_fname'];
        }
        ?>
        required>
        <br>
        <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
		




        <input type="text" name="reg_lname" placeholder="Last Name" 
        value=<?php
        if(isset($_SESSION['reg_lname'])){
          echo $_SESSION['reg_lname'];
        }
        ?>
        
        required>
        <br>
		<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>



        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm your email" required>
        <br>
        <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
	   	else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
		else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>



        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm your password" required>
        <br>
        <input type="submit" name="reg_button" value="Register">
        <br>
        <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
		else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
		else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>




      </form>
</body>
</html>