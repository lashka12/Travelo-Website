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
foreach ($data as $c) {
    $company = $c['company'];
    $car = $c['car'];
    $pickUpCity = $c['pickUpCity'];
    $seats = $c['seats'];
    $automatic = $c['automatic'];
    $basePrice = $c['basePrice'];
    $adultPrice = $c['adultPrice'];


    // preparing statement for insert query

    $sql ="INSERT INTO cars(company, car, pickUpCity, seats,automatic,basePrice,adultPrice)
           VALUES(' ".$company." ',' ".$car." ','".$pickUpCity." ',' ".$seats."',' ".$automatic." ','".$basePrice." ',' ".$adultPrice."')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
     }

     header("location:viewDB.php");

    $conn->close();
    ?>
