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

$newEmail=$_GET['newEmail'];
$newFirstName=$_GET['newFirstName'];
$newLastName=$_GET['newLastName'];
$newBirthDate=$_GET['newBirthDate'];
$newPhoneNumber=$_GET['newPhoneNumber'];
$newAddress=$_GET['newAddress'];


$sql =
"UPDATE users
 SET email = '$newEmail', firstname= '$newFirstName' ,lastname= '$newLastName',address='$newAddress' ,birthDate= '$newBirthDate' ,phoneNumber= '$newPhoneNumber'
 WHERE email = '$userEmail'";


if ($conn->query($sql) === TRUE) { /// if the db was updated succesfully then we need to update the session

echo "record updated ";

$sql =
"SELECT email, firstname, lastname,birthDate,address,phoneNumber,password,profilePictureFileName
 FROM users
 where email='$newEmail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();

$_SESSION['email']=$row["email"];
$_SESSION['password']=$row["password"];
$_SESSION['birthDate']=$row["birthDate"];
$_SESSION['firstName']=$row["firstname"];
$_SESSION['lastName']=$row["lastname"];
$_SESSION['phoneNumber']=$row["phoneNumber"];
$_SESSION['address']=$row["address"];
$_SESSION['picUrl']=$row["profilePictureFileName"];

//echo "<script> function(); </script>";
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
