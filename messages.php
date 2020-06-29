<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title><Find Friends></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>
<div class="row">
    <?php
      if(isset($_GET['u_id'])){
          global $con;

          $get_id = $_GET['u_id'];

          $get_user="select * from users where user_id='$get_id'";
          
          $run_user= mysqli_query($con,$get_user);
          $row_user =mysqli_fetch_array($run_user);

          $user_to_msg=$row_user['user_id'];
          $user_to_name=$row_user['user_name'];
      }

      $user =$_SESSION['user_email'];
      $get_user="select * from users where user_email='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);

      $user_from_msg= $row['user_id'];
      $user_from_name= $row['user_name'];
?>
    <div class='col-sm-3' id = 'select_user'>
      <?php 
        $user="select * from users";
          $run_user=mysqli_query($con,$user);
          while($row_user = mysqli_fetch_array($run_user)){
              $user_id=$row_user['user_id'];
              $user_name=$row_user['user_name'];
              $first_name=$row_user['f_name'];
              $last_name=$row_user['l_name'];
              $user_image=$row_user['user_image'];

            echo"
                <div class ='container-fluid'>
                  <a style = 'text-decoration: none;cursor:pointer;color:#3897f0;'
                  href='messages.php?u_id=$user_id'>
                  <img class ='img-circle' src='users/$user_image' width='90px' height='80px' title='$user_name'>
                  <strong>&nbsp $first_name $last_name</strong<br><br>
                  </a>
                  </div>
            ";
          }

          ?>
          </div>
          <div class='col-sm-6'>
             <div class='load_msg' id='scroll_messages'>
                <?php
                $sel_msg="select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR
                (user_from='$user_to_msg' AND user_to='$user_from_msg')ORDER BY 1 ASC";
                $run_msg= mysqli_query($con,$sel_msg);

                while($row_msg=mysqli_fetch_array($run_msg)){
                    $user_to=$row_msg=['user_to'];
                    $user_from=$row_msg['user_from'];
                    $msg_body=$row_msg['msg_body'];
                    $msg_date=$row_msg['date'];

                    ?>

                    <div>
                    <p> <?php if($user_to == $user_to_msg AND $user_from==$user_from_msg){
                        echo"<div class='message' id='blue' data-toggle='tooltip' title='msg_date'>$msg_body</div?";}
                        
                        else if($user_from ==$user_to_msg AND $user_to==$user_from_msg){
                            echo" <div class='message' id='green'
                            data-toggle='tooltip' title='$msg_date'>
                            $msg_body</div><br><br><br> ";   }
   
                        
                        ?></p>
                    </div>
                    <?php
                }
                ?>
              </div>
              <?php 
              if(isset($_GET['u_id'])){
                  $u_id =$_GET['u_id'];
                   if($u_id=="new"){
                       echo"
                          <form>
                          <center><h3>Select someone to start comversation</h3></enter>
                          <textarea disabled class='form-control' placeholder='Enter your messages'></textarea>  
                          <input type='submit' class='btn btn-default' disabled value='send'>
                          </form><br><br>

                       ";
                   }
              }

                ?>






          </div>


</div>
</body>
</html>