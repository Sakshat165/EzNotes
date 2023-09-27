<?php

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword =$_POST['cpassword'];



function open()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db="eznotes";

  $conn = new mysqli($servername, $username, $password,$db) or die("connection failed".$conn->error);
  return $conn;
}

function close()
{
  $conn->close();
}

$conn=open();
$sql = "INSERT INTO signup VALUES ('$name','$email','$password','$cpassword')";
if($conn->query($sql)===true)
{
  header('Location:http://'. $_SERVER['HTTP_HOST'].'/Website/SignIn.html');
}
else{
  echo "Nahh".$conn->error;
}
close($conn);


?>