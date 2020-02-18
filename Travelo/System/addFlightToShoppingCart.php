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


$number=$_GET['number'];

$sql = "SELECT * FROM flights where number='$number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $num=$row["number"];
        $email=$_SESSION['email'];
        $airLine=$row["airLine"];
        $company=$row["company"];
        $fromCity=$row["fromCity"];
        $toCity=$row["toCity"];
        $price=$row['price'];
        $fromDate=$row['departure1'];

        if($row['direct']=="yes"){

        $direct="direct";
      }
else {
  $direct="";
}


        if($row['oneWay']=="yes"){
        $arrow= "➝";
        $toDate=$row['arrival1'];

       }
        else {
          $arrow= "⇆";
          $toDate=$row['arrival2'];

        }



    }

} else {
    echo "0 results";
}



$sql = " INSERT INTO shoppingcart (ser ,userEmail, discription,price)
         VALUES ('$num','$email','$airLine - Flight : $num , $fromCity $arrow $toCity  $direct  ( $fromDate ➝ $toDate )  ','$price') ";

if ($conn->query($sql) === TRUE) {
  echo "was added to cart successfully";
}
else{
  echo "flight was not added";
}
$_SESSION['flightAdded']="yes";
header("location:flights.php");


$conn->close();

?>
