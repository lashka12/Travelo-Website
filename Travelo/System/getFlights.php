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


$fromCity=$_SESSION['searchFlightFromCity'];
$fromDate=$_SESSION['searchFlightFromDate'];
$toCity=$_SESSION['seacrhFlightToCity'];
$toDate=$_SESSION['searchFlightToDate'];
$direct=$_SESSION['direct'];
$oneWay=$_SESSION['oneWay'];
$tst="yes";
$hide="";


if($fromCity==""){

  $sql ="SELECT * FROM flights fl inner join airlines al on fl.airLine=al.name ";

}

else{
  if($oneWay==$tst){
$sql ="SELECT * FROM flights fl inner join airlines al on fl.airLine=al.name where fromCity='$fromCity' and toCity='$toCity' and oneWay='$oneWay' and departure1='$fromDate' and direct='$direct'";
}
else{
  $sql ="SELECT * FROM flights fl inner join airlines al on fl.airLine=al.name where fromCity='$fromCity' and toCity='$toCity' and oneWay='no' and departure1='$fromDate' and arrival2='$toDate' and direct='$direct'";

}


}

$result = $conn->query($sql);

$data = array();
while($row=mysqli_fetch_assoc($result)) {

  $num=$row["number"];
  $email=$_SESSION['email'];
  $sql2 ="SELECT * FROM shoppingcart where ser='$num'and userEmail='$email' ";
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
