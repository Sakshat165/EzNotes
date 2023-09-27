<?php


$email=$_POST['email'];
$password=$_POST['password'];




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
$sql = "SELECT * FROM signup WHERE email='$email' AND password='$password' ";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)===1)
{
    $row=mysqli_fetch_assoc($result);
    if($row['email']===$email && $row['password']===$password)
    {
        header('Location:http://'. $_SERVER['HTTP_HOST'].'/Website/main2.html');
        exit();
    }
  
}
else{
  echo "Nahh".$conn->error;
}


?>