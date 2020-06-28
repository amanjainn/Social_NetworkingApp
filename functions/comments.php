<?php
 

 $get_id =$_GET['post_id'];

 $get_com="select * from the comments where post_id='$get_id' ORDER BY 1 desc";

 $run_com = mysqli_query($con,$get_com);

 while($row =mysqli_fetch_array($run_com)){
     $com= $row['comment'];
     $com_name=$row['comment_author'];
     $date=$row=['date'];

    echo"
    <div class="row">
    </div>
  ";

 }


 ?>