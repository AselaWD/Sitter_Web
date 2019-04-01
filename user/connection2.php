<?php
//create connection
  $connection2 = mysqli_connect("localhost","root","","ha07");
//checking connection
  if(mysqli_connect_errno()){
    die("Database connection Failed" . mysqli_connect_errno());
  } else {
    echo "connection successfull";
  }

?>
