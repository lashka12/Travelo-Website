<?php

session_start();
if(!isset($_SESSION['email'])){

  header("location:index.php");

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../styles/shoppingCart.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Purchase History</title>
  </head>
  <body>

    <div class="row">

    <ul class="main-nav">
      <li style="padding-left:20px;">  <div class="dropdown"style="background-color: Transparent; border: none;">
        <button class="btn btn-primary dropdown-toggle" type="button"data-toggle="dropdown"style="background-color: Transparent;border: none; color: white;text-decoration: none; padding: 6px 20px;font-size: 16px;">
          <img src=../profilePictures/<?= $_SESSION['picUrl']?> id="avt" alt="Avatar" class="avatar" style="border-radius:50%; width:40px;height:40px;">
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a href="profile.php"><i class="fa fa-address-card"></i> Profile</a></li>
        <li><a href="shoppingCart.php"><i class="fas fa-cart-arrow-down"></i> Shopping Cart</a></li>
        <li><a href="purchaseHistory.php"><i class="fas fa-history"></i> Purchase History</a></li>
        <li><a href="signOut.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
        </ul>

        </div></li>


    <li><a href="homePage.php"><image src="../SysPictures/plane.png" height=25px width=30px;> Travelo</a></li>
    <li><a href="travel.php"><i class="fas fa-plane"></i> Travel Now</a></li>
    <li><a href="hotels.php"><i class="fas fa-hotel"></i> Hotels</a></li>
    <li><a href="flights.php"><i class="fas fa-plane-departure"></i> Flights</a></li>
    <li><a href="Cars.php"><i class="fas fa-car"></i> Cars Rental</a></li>
    <li>  <div class="dropdown"style="background-color: Transparent; border: none;">
      <button class="btn btn-primary dropdown-toggle" type="button"data-toggle="dropdown"style="background-color: Transparent;border: none; color: white;text-decoration: none; padding: 6px 20px;font-size: 16px;">💰 Currency
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
      <li><a href="#">Israeli New Shekel(₪)</a></li>
      <li><a href="#">Unaited States Dollar($)</a></li>
      </ul>
      <?php if ($_SESSION['email']=='Admin'){ ?>
        <li id="viewDB" ><a href="viewDB.php" ><i class="fas fa-database"></i> DataBase View</a></li>
      <?php } ?>
      </div></li>
    </ul>
    </div>




         <table id="ItemsTbl" style="width:70%; text-align:center;"> </table>
         <div id="myCart"><br><br><br></diV>






     <div style="width:1000px; padding-left:50px;"align="center">
         <table class="table">
           <thead>
             <tr>
               <th scope="col"></th>
               <th scope="col">תאריך עסקה</th>
               <th scope="col">מספר סיריאלי</th>
               <th scope="col">פרטי עסקה</th>
               <th scope="col">מחיר ששולם</th>
             </tr>
           </thead>
           <tbody id="items">

           </tbody>
         </table>

    <div>

    <br>
    <br>







    <script>

    var items='';
    var i=1;;
    $.getJSON("getPurshaseHistory.php",function(data){
        $.each(data,function(key,value){

           items+='<tr>';
           items+='<th scope="row">'+i+'';
           items+='</th>';
           items+='<td>'+value.purchaseDate+'</td>';
           items+='<td>'+value.ser+'</td>';
           items+='<td>'+value.discription+'</td>';
           items+='<td>'+value.price+'</td>';
           items+='</tr>';
          i++;
         });


         $('#items').append(items);

      });

    </script>





















  </body>
</html>
