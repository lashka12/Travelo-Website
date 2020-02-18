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
foreach ($data as $hotel) {
    $id = $hotel['id'];
    $name = $hotel['name'];
    $city = $hotel['city'];
    $stars = $hotel['stars'];
    $adultPricePerDay = $hotel['adultPricePerDay'];
    $childPricePerDay = $hotel['childPricePerDay'];
    $mainPicture = $hotel['mainPicture'];
    $discription = $hotel['discription'];


    // preparing statement for insert query

    $sql ="INSERT INTO hotels(id, name, city, stars,adultPricePerDay,childPricePerDay,mainPicture,discription)
           VALUES(' ".$id." ',' ".$name." ','".$city." ',' ".$stars."',' ".$adultPricePerDay." ','".$childPricePerDay." ',' ".$mainPicture."',' ".$discription."')";

    if ($conn->query($sql) === TRUE) {
    echo "New record added successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
     }

     header("location:viewDB.php");

    $conn->close();
    ?>
