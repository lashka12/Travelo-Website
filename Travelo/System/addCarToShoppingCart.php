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


$serial=$_GET['serial'];

$sql = "SELECT * FROM cars where serial='$serial'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "serial: " . $row["serial"]. " - car: " . $row["car"]. " " . $row["company"]. "<br>";
        $ser=$row["serial"];
        $email=$_SESSION['email'];
        $car=$row["car"];
        $company=$row["company"];


        $date1 =  new DateTime($_SESSION['searchCarFromDate']);
        $date2 =  new DateTime($_SESSION['searchCarToDate']);
        $diff = $date1->diff($date2);
        $interval =  $diff->format("%a");
        $date1AsString = $date1->format('Y-m-d');
        $date2AsString = $date2->format('Y-m-d');

         echo $interval;

         if($_SESSION['age']>23){
         $total = $row["basePrice"] * $interval;
       }
       else{
         $total = $row["adultPrice"] * $interval;

       }

    }

} else {
    echo "0 results";
}



$sql = " INSERT INTO shoppingcart (ser ,userEmail, discription,price)
         VALUES ('$ser','$email','$car $company $date1AsString - $date2AsString ' ,'$total') ";

if ($conn->query($sql) === TRUE) {
  echo "was added to cart successfully";
}
else{
  echo "car was not added";
}
$_SESSION['carAdded']="yes";
header("location:cars.php"); // go to home page after register as a new user



$conn->close();

?>
