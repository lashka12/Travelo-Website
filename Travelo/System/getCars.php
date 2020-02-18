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
$fromCity=$_SESSION['searchCarFromCity'];
$fromDate=$_SESSION['searchCarFromDate'];
$toDate=$_SESSION['searchCarToDate'];
$direct=$_SESSION['age'];

$hide="";

if($fromCity==""){

   $sql ="SELECT *
   FROM cars c inner join carrentalcompany cc
   on c.company=cc.name
   order by c.discription desc";

   $hide="hidden";

}

else{
  $sql ="SELECT * FROM cars c inner join carrentalcompany cc on c.company=cc.name where c.pickUpCity='$fromCity'order by c.discription desc ";

}



$result = $conn->query($sql);

$data = array();
while($row=mysqli_fetch_assoc($result)) {

   $ser2=$row["serial"];
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
