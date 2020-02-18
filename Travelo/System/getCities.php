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

$sql =
"SELECT * FROM cities ";

$result = $conn->query($sql);

$data = array();
while($row=mysqli_fetch_assoc($result)) {
   $data[] = $row;
}

echo json_encode($data);


?>
