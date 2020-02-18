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
$hotelNumber= $_SESSION['hotelNumber'];

$sql ="SELECT * From feedback where itemNumber='$hotelNumber'";
$result = $conn->query($sql);
$data = array();

while($row=mysqli_fetch_assoc($result)) {


  $reviewNumber=$row['number'];
  $sql2 ="SELECT * From reviewcomments where  reviewNumber='$reviewNumber'";
  $result2 = $conn->query($sql2);

      $comments="";
      while($row2=mysqli_fetch_assoc($result2)) {

       if($row2["comment"]!=""||$row2["comment"]!=''){
       $comments.=$row2["commenterEmail"]. " : ' " .$row2["comment"]." ' ."."***";
     }

      }

  $row["comments"]=$comments;

  $data[] = $row;
}


echo json_encode($data);


?>
