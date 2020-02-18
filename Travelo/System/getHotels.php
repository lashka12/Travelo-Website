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

$email=$_SESSION['email'];
$stars=$_SESSION['searchHotelStars'];
$city=$_SESSION['searchHotelCity'];
$from=$_SESSION['searchHotelFromDate'];
$to=$_SESSION['searchHotelToDate'];
$hide="";

if($city==""){
  $sql ="SELECT * FROM hotels";
  $hide="hidden";


}

else{
$sql ="SELECT * FROM hotels where stars='$stars' and city='$city'";
}

$result = $conn->query($sql);

$data = array();
while($row=mysqli_fetch_assoc($result)) {

  $ser2=$row["id"];
  $sql2 ="SELECT * FROM shoppingcart where ser='$ser2'and userEmail='$email' ";
  $result2 = $conn->query($sql2);
  $check="no";

  while($row2=mysqli_fetch_assoc($result2)) {
    $check="yes";

  }
  if($check=="yes"){
    $row["taken"]="yes";
  }

  if($hide=="hidden"){
    $row["hidden"]="yes";

  }
   $data[] = $row;
}

echo json_encode($data);


?>
