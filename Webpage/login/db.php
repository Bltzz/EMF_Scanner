<!--PHP connection to the database -->

<?php
$con = mysqli_connect("localhost","root","","EMF");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>