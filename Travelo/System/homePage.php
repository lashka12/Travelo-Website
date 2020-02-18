
<?php

session_start();

if(!isset($_SESSION['email'])){

  header("location:index.php");

}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/homePageStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
iframe {
  display: block;
  width: 900px;
  height: 505px;
  margin: 0 auto;
  border: 0;
  -webkit-box-shadow: -1px 1px 105px 38px rgba(0,0,0,0.75);
  -moz-box-shadow: -1px 1px 105px 38px rgba(0,0,0,0.75);
  box-shadow: -1px 1px 105px 38px rgba(0,0,0,0.75);
}
</style>
  </head>


  <body>


<script>


var newUser = "<?php echo $_SESSION['firstLogIn'] ?>";
if(newUser=="true"){
<?php $_SESSION['firstLogIn']='false'; ?>
$(document).ready(function(){
$('#welcomeModal').modal('show');

 });
}


</script>

<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"style="text-align:center">Welcome New User</h1>

      </div>

      <div class="modal-body">
        <h3 class="modal-title" style="text-align:center">Tips For you</h3>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script>
var items='';
let i=0;
$.getJSON("getNotification.php",function(data){
    $.each(data,function(key,value){
       items+='<p><i class="fas fa-comments"style="color:blue;"></i>'+"  "+value.notification+'</p>';
       i++;
     });
     $('#items').append(items);
  });


  $(document).ready(function(){
    if(i>0){
  $('#notificationModal').modal('show');
}

   });


</script>



<!-- Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:380px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:red;text-align:center;"><i class="fas fa-bell"></i> Notifications</h5>
        </button>
      </div>
      <div class="modal-body">

      <div id="items" style="text-align:center"></div>

      </div>

    </div>
  </div>
</div>


    <header>
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


      <li><a href="homePage.php"id="main-tab"><image src="../SysPictures/plane.png" height=25px width=30px;> Travelo</a></li>
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



    </header>

<br>
    <p class="uName"style="align:center; font-size: 30px; color:white;padding:25px;"> 🔓 Welcome , <?= $_SESSION['firstName']?></p>



    <br>
    <br>
    <br>


    <iframe src="https://www.youtube.com/embed/sb6WlQiaJeM?ecver=2&autoplay=1&mute=1"   frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>



<br>
<br>




</header>


<section class="section section-a">
    <div class="container">
      <h2>What Travelo ?</h2>
      <p>Travelo compares millions of cheap flights from international and local companies such as El Al, <a href="">Gulliver</a>, Smartair, etc to find you the cheapest flight tickets fast. Whether you want to go to London or Bangkok, we'll find low cost flights to get you there. We also find the cheapest hotels and car rental deals.
      When you find your flights and click to book, we link you through directly to the airline or travel agent to book flights with them. We don´t add any hidden charges or fees. So you get the cheapest flights every time! Discover more ways we put you first</p>
    </div>
  </section>
  <section class="section section-b">
      <div class="container">
        <h2>Travilo recommended in the news</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde, impedit amet minima iste autem cumque et maiores blanditiis doloribus aut dolorum quaerat non est voluptatum, tempore ut dolorem voluptas quod quae accusantium, ex inventore ducimus. Beatae mollitia exercitationem, quam similique, consectetur ratione reprehenderit delectus neque eligendi facere soluta dolor ducimus!
        Why not join the millions of travellers that use our free apps to compare flights and book low cost flights, hotels and car rental options? <a href="">Download now</a>
        Founded in 2003, we employ over 900 staff, with offices in Barcelona, Beijing, Budapest, Edinburgh, Glasgow, London, Miami, Shenzhen, Singapore and Sofia. Travelo is part of the Ctrip group.</p>
      </div>
    </section>
    <br><br>
    <section class="section section-c">
        <div class="container">
          <p>Copyright © Information Systems (Lorans Ashkar) Travelo Inc. All Rights Reserved. Accessibility, User Agreement, Privacy, Cookies and AdChoice</p></div>

      </section>


  </body>





</html>
