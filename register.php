
<?php
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
$error_array =""; //Holds error messages

if(isset($_POST['reg_button'])){

  //  First Name
   $fname = strip_tags($_POST['reg_fname']); //Remove html tags
   $fname = str_replace(' ', '',$fname); //Remove spaces
   $fname= ucfirst(strtolower($fname)); // Uppercase first letter

  //  Last Name
  $lname = strip_tags($_POST['reg_lname']); //Remove html tags
  $lname = str_replace(' ', '',$lname); //Remove spaces
  $lname= ucfirst(strtolower($lname)); // Uppercase first letter

  //  Email
  $em = strip_tags($_POST['reg_email']); //Remove html tags
  $em = str_replace(' ', '',$em); //Remove spaces
  $em= ucfirst(strtolower($em)); // Uppercase first letter

  //  Email
  $em2 = strip_tags($_POST['reg_email2']); //Remove html tags
  $em2 = str_replace(' ', '',$em2); //Remove spaces
  $em2 = ucfirst(strtolower($em2)); // Uppercase first letter

  //  Password
  $password = strip_tags($_POST['reg_password']); //Remove html tags
  $password2 = strip_tags($_POST['reg_password2']); //Remove html tags
 
  $date = date("Y-m-d"); //Current date

  // Email validation
   if($em==$em2){
    $domain = explode('@',$em)[1];
    if($domain != 'bmsce.ac.in'){
    echo('This domain fo email address is not allowed!') ;
  }
  // Check for dupliates email
  $e_check = mysqli_query($con,"SELECT email from users where email='$em'");

  //  Count the number of rows returned
  $nums_rows= mysqli_num_rows($e_check);

  if($nums_rows>0){
    echo "Email already exist";
  }

   }else{
     echo("Emails don't match");
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
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm your email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm your password" required>
        <br>
        <input type="submit" name="reg_button" value="Register">
        <br>




      </form>
</body>
</html>