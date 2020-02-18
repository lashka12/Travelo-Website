<?php
session_start();  // start/continue the session

$pswrd=$_GET['password'];
$email=$_GET['UserName'];


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




$sql =
"SELECT email,firstname,lastname,birthDate,address,phoneNumber,password,profilePictureFileName
 FROM users
 where email='$email' AND password='$pswrd'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();

$_SESSION['email']=$row["email"];
$_SESSION['birthDate']=$row["birthDate"];
$_SESSION['address']=$row["address"];
$_SESSION['phoneNumber']=$row["phoneNumber"];
$_SESSION['password']=$row["password"];
$_SESSION['picUrl']=$row["profilePictureFileName"];
$_SESSION['firstName']=$row["firstname"];
$_SESSION['lastName']=$row["lastname"];

$_SESSION['firstLogIn']='false';
$_SESSION['try']='true';
header("location:homePage.php");

}

else {

$_SESSION['try']='true';
$_SESSION['err']='Wrong Username Or Password';
header("location:index.php");

}



///////////////////////////////////////////////////////////////

$conn->close();
?>
