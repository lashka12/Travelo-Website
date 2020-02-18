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


$id=$_GET['id'];

$sql = "SELECT * FROM hotels where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $email=$_SESSION['email'];
        $name=$row["name"];
        $city=$row["city"];
        $stars=$row["stars"];

        $date1 =  new DateTime($_SESSION['searchHotelFromDate']);
        $date2 =  new DateTime($_SESSION['searchHotelToDate']);
        $diff = $date1->diff($date2);
        $interval =  $diff->format("%a");
        $date1AsString = $date1->format('Y-m-d');
        $date2AsString = $date2->format('Y-m-d');

        $daysCount = (int)$interval;
        $childrenCount=(int)$_SESSION['searchHotelKids'];
        $adultsCount=(int)$_SESSION['searchHotelAdults'];
        $childPrice=(int)$row["childPricePerDay"];
        $adultPrice=(int)$row["adultPricePerDay"];





        $total = ($daysCount*(($childrenCount * $childPrice)+($adultsCount * $adultPrice)));

        echo $total;


    }

} else {
    echo "0 results";
}



$sql = " INSERT INTO shoppingcart (ser ,userEmail, discription,price)
         VALUES ('$id','$email','Hotel : $name , $city , $stars Stars , $date1AsString  -  $date2AsString ' ,' $total ') ";

if ($conn->query($sql) === TRUE) {
  echo "was added to cart successfully";
}
else{
  echo "car was not added";
}
$_SESSION['hotelAdded']="yes";
 header("location:hotels.php");



$conn->close();

?>
