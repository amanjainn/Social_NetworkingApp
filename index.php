<?php
$con = mysqli_connect("localhost","root","","bmsce_talks");

if(mysqli_connect_errno()){
    echo "Failed to connect " . mysqli_connect_errno();
}
$query= mysqli_query($con,"INSERT INTO test2 VALUES (NULL,'aman')")


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bmsce Talks</title>
</head>
<body>
    hello world
</body>
</html>