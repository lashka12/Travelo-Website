<?php
session_start();
//////////////////////// Create connection //////////////////////

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelo";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) { // Check connection
die("Connection failed: " . $conn->connect_error);
}

////////////////////////////////////////////////////////////////

$userEmail=$_SESSION['email'];
$newPassWord=$_GET['changePass1'];

$sql = " UPDATE users SET password='$newPassWord' WHERE email = '$userEmail' ";

if ($conn->query($sql) === TRUE) { /// if the db was updated succesfully then we need to update the session

echo "record updated ";

$sql ="SELECT password FROM users where email='$userEmail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();

$_SESSION['password']=$row["password"];

header("location:profile.php");

}

else {

header("location:index.php");

}

}
else {
echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();
?>
