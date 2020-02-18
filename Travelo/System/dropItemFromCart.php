<?php

session_start();  // start/continue the session

//////////////////////// Create connection //////////////////////

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelo";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {// Check connection
die("Connection failed: " . $conn->connect_error);
}

////////////////////////////////////////////////////////////////


//////////////////// Insert Query ////////////////////

$email=$_SESSION['email'];
$ser=$_GET['ser'];


$sql = " DELETE From shoppingCart where userEmail='$email' and ser='$ser'";

if ($conn->query($sql) === TRUE) {

  echo "item was removed";

  }

  else {

    echo "item was not removed";

}


header("location:shoppingCart.php"); 
$conn->close();


?>
