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

$email=$_GET['newUserEmail'];
$fName=$_GET['newUserFirstName'];
$lName=$_GET['newUserLastName'];
$phoneNumber=$_GET['newUserPhoneNumber'];
$birthdate=$_GET['newUserBirthDate'];
$password=$_GET['newUserPassword1'];
$address=$_GET['newUserAddress'];





$sql = "INSERT INTO users (email,firstname, lastname,address,phoneNumber,password,profilePictureFileName,birthDate)
VALUES ('$email','$fName','$lName','$address','$phoneNumber','$password','blank-profile-picture.png','$birthdate')";

if ($conn->query($sql) === TRUE) {



  $_SESSION['email']=$email;
  $_SESSION['password']=$password;
  $_SESSION['birthDate']=$birthdate;
  $_SESSION['firstName']=$fName;
  $_SESSION['lastName']=$lName;
  $_SESSION['phoneNumber']=$phoneNumber;
  $_SESSION['address']=$address;
  $_SESSION['picUrl']="blank-profile-picture.png";
  $_SESSION['firstLogIn']='true';
  $_SESSION['try']='true';
  $_SESSION['err']='';
  $_SESSION['duplicate']='';
  header("location:homePage.php"); // go to home page after register as a new user


}

else {


  $_SESSION['Faildemail']=$email;
  $_SESSION['Faildpassword']=$password;
  $_SESSION['FaildbirthDate']=$birthdate;
  $_SESSION['FaildfirstName']=$fName;
  $_SESSION['FaildlastName']=$lName;
  $_SESSION['FaildphoneNumber']=$phoneNumber;
  $_SESSION['Faildaddress']=$address;


$_SESSION['try']='true';
echo "Error: " . $sql . "<br>" . $conn->error;
$_SESSION['duplicate']='yes';

header("location:index.php"); // go to home page after register as a new user



}




$conn->close();






?>
