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


$fileName=$_GET['filename'];
// reading json file
echo $fileName;
$json = file_get_contents($fileName);

//converting json object to php associative array
$data = json_decode($json, true);

// processing the array of objects
foreach ($data as $flight) {
    $num = $flight['number'];
    $fromCity = $flight['fromCity'];
    $toCity = $flight['toCity'];
    $departure1 = $flight['departure1'];
    $arrival1 = $flight['arrival1'];
    $departureTime1 = $flight['departureTime1'];
    $arrivalTime1 = $flight['arrivalTime1'];
    $departure2 = $flight['departure2'];
    $arrival2 = $flight['arrival2'];
    $departureTime2 = $flight['departureTime2'];
    $arrivalTime2 = $flight['arrivalTime2'];
    $airLine = $flight['airLine'];
    $departureAirport = $flight['departureAirport'];
    $arrivalAirport = $flight['arrivalAirport'];
    $oneWay = $flight['oneWay'];
    $direct = $flight['direct'];
    $price = $flight['price'];

    // preparing statement for insert query

    $sql ="INSERT INTO flights(number, fromCity, toCity, departure1,arrival1,departureTime1,arrivalTime1,departure2,arrival2,departureTime2,arrivalTime2,airLine,departureAirport,arrivalAirport,oneWay,direct,price)
           VALUES(' ".$num." ',' ".$fromCity." ','".$toCity." ',' ".$departure1."',' ".$arrival1." ','".$departureTime1." ','".$arrivalTime1."',' ".$departure2."',' ".$arrival2."'
                  ,'".$departureTime2." ','".$arrivalTime2."','".$airLine."','".$departureAirport."','".$arrivalAirport."','".$oneWay."','".$direct."','".$price."')";

    if ($conn->query($sql) === TRUE) {
    echo "New record added successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
     }

    header("location:viewDB.php");

    $conn->close();
    ?>
