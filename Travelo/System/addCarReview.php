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


$email=$_SESSION['email'];
$carNumber=$_SESSION['carNumber'];
$fb=$_GET['review'];
$grade=$_GET['grade'];
$now=date("Y/m/d");




$sql = " INSERT INTO feedback (email ,postDate, itemNumber,feedBack,grading)
         VALUES ('$email','$now','$carNumber' ,'$fb',$grade) ";


if ($conn->query($sql) === TRUE) {
  echo "was added to  successfully";
}
else{
  echo "car was not added";
}

header("location:carReviews.php"); // go to home page after register as a new user
$_SESSION['addedCarReview']="yes";

$conn->close();

?>
