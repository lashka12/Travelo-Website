<?php

session_start();
if(!isset($_SESSION['email'])){

  header("location:index.php");

}
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

$email=$_SESSION['email'];

$sql ="SELECT * From purchaseHistory where userEmail='$email'";

$result = $conn->query($sql);
$data = array();

while($row=mysqli_fetch_assoc($result)) {
  $data[] = $row;
}


echo json_encode($data);


?>
