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

$reviewNumber=$_GET['revNum'];

$email=$_SESSION['email'];
$date=date("Y/m/d");
$comm=$_GET['comment'];



$sql = " INSERT INTO reviewcomments (reviewNumber ,commenterEmail, commentDate,comment)
         VALUES ('$reviewNumber','$email','$date ' ,'$comm') ";

if ($conn->query($sql) === TRUE) {
  echo "was added  successfully";


  $sql2 =
  "SELECT Email FROM feedBack where number='$reviewNumber' ";
  $result = $conn->query($sql2);
  $data = array();
  while($row=mysqli_fetch_assoc($result)) {
     $reviewerEmail=(string)$row["Email"];
  }


$sql = "INSERT INTO popupnotification (targetEmail,seen,notification)
VALUES ('$reviewerEmail' ,'no','$email has Commented On Your Post')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
else{
  echo "car was not added";
}

header("location:HotelReview.php"); // go to home page after register as a new user
$_SESSION['addedComment']="yes";

$conn->close();

?>
