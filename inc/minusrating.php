<?php

include('connect.php');

// Get values from form 
$id=$_POST['id'];
// Insert data into mysql 
$sql="UPDATE videos SET rating = rating-1 WHERE id='$id'";
$result=mysqli_query($con, $sql);

// close connection 
mysqli_close($con);
?>