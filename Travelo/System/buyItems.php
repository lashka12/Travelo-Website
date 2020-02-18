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


//////////////////// Insert Query ////////////////////

$email=$_SESSION['email'];


$sql = "SELECT * FROM shoppingCart where userEmail='$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row=mysqli_fetch_assoc($result)) {

    $nowDate=date("Y/m/d");
    $ser=(string)$row["ser"];
    $disc=$row["discription"];
    $price=$row["price"];

    $sql2 = "INSERT INTO purchasehistory (ser,userEmail,discription,purchaseDate,price)
    VALUES ('$ser', '$email', '$disc','$nowDate','$price')";

    if ($conn->query($sql2) === TRUE) {

      $sql3 = "DELETE FROM shoppingCart WHERE userEmail='$email'and ser='$ser'";

      if ($conn->query($sql3) === TRUE) {
          echo "Record deleted successfully";
      } else {
          echo "Error deleting record: " . $conn->error;
      }



    }
    else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }



}




}


header("location:shoppingCart.php"); // go to home page after register as a new user

$conn->close();






?>
