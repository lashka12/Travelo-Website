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
     <title>My Shopping Cart</title>
     <link rel="stylesheet" href="../styles/shoppingCart.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



     <style media="screen">
     @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);
body,html {
height:100%;
margin:0;
font-family:lato;
}

h2 {
margin-bottom:0px;
margin-top:25px;
text-align:center;
font-weight:200;
font-size:19px;
font-size:1.2rem;

}

.dropdown-select.visible {
display:block;
}
.dropdown {
position:relative;
}
ul {
margin:0;
padding:0;
}
ul li {
list-style:none;
padding-left:10px;
cursor:pointer;
}
ul li:hover {
background:rgba(255,255,255,0.1);
}
.dropdown-select {
position:absolute;
background:#77aaee;
text-align:left;
box-shadow:0px 3px 5px 0px rgba(0,0,0,0.1);
border-bottom-right-radius:5px;
border-bottom-left-radius:5px;
width:90%;
left:2px;
line-height:2em;
margin-top:2px;
box-sizing:border-box;
}
.thin {
font-weight:400;
}
.small {
font-size:12px;
font-size:.8rem;
}
.half-input-table {
border-collapse:collapse;
width:100%;
}
.half-input-table td:first-of-type {
border-right:10px solid #4488dd;
width:50%;
}

.order-info {
height:100%;
width:50%;
padding-left:25px;
padding-right:25px;
box-sizing:border-box;
display:-webkit-box;
display:-webkit-flex;
display:-ms-flexbox;
display:flex;
-webkit-box-pack:center;
-webkit-justify-content:center;
-ms-flex-pack:center;
justify-content:center;
position:relative;
}
.price {
bottom:0px;
position:absolute;
right:0px;
color:#4488dd;
}
.order-table td:first-of-type {
width:25%;
}
.order-table {
  position:relative;
}
.line {
height:1px;
width:100%;
margin-top:10px;
margin-bottom:10px;
background:#ddd;
}
.order-table td:last-of-type {
vertical-align:top;
padding-left:25px;
}
.order-info-content {
table-layout:fixed;

}

.full-width {
width:100%;
}
.pay-btn {
border:none;
background:#22b877;
line-height:2em;
border-radius:10px;
font-size:19px;
font-size:1.2rem;
color:#fff;
cursor:pointer;
position:absolute;
bottom:25px;
width:calc(100% - 50px);
-webkit-transition:all .2s ease;
        transition:all .2s ease;
}
.pay-btn:hover {
background:#22a877;
  color:#eee;
-webkit-transition:all .2s ease;
        transition:all .2s ease;
}

.total {
margin-top:25px;
font-size:20px;
font-size:1.3rem;
position:absolute;
bottom:30px;
right:27px;
left:35px;
}
.dense {
line-height:1.2em;
font-size:16px;
font-size:1rem;
}
.input-field {
background:rgba(255,255,255,0.1);
margin-bottom:10px;
margin-top:3px;
line-height:1.5em;
font-size:20px;
font-size:1.3rem;
border:none;
padding:5px 10px 5px 10px;
color:#fff;
box-sizing:border-box;
width:100%;
margin-left:auto;
margin-right:auto;
}
.credit-info {
background:#4488dd;
height:100%;
width:50%;
color:#eee;
-webkit-box-pack:center;
-webkit-justify-content:center;
    -ms-flex-pack:center;
        justify-content:center;
font-size:14px;
font-size:.9rem;
display:-webkit-box;
display:-webkit-flex;
display:-ms-flexbox;
display:flex;
box-sizing:border-box;
padding-left:25px;
padding-right:25px;

position:relative;
}
.dropdown-btn {
background:rgba(255,255,255,0.1);
width:100%;
border-radius:5px;
text-align:center;
line-height:1.5em;
cursor:pointer;
position:relative;
-webkit-transition:background .2s ease;
        transition:background .2s ease;
}
.dropdown-btn:after {
content: '\25BE';
right:8px;
position:absolute;
}
.dropdown-btn:hover {
background:rgba(255,255,255,0.2);
-webkit-transition:background .2s ease;
        transition:background .2s ease;
}
.dropdown-select {
display:none;
}
.credit-card-image {
display:block;
max-height:80px;
margin-left:auto;
margin-right:auto;
margin-top:35px;
margin-bottom:15px;
}
.credit-info-content {
margin-top:25px;
-webkit-flex-flow:column;
    -ms-flex-flow:column;
        flex-flow:column;
display:-webkit-box;
display:-webkit-flex;
display:-ms-flexbox;
display:flex;
width:100%;
}
@media (max-width: 600px) {
.window {
  width: 100%;
  height: 100%;
  display:block;
  border-radius:0px;
}
.order-info {
  width:100%;
  height:auto;
  padding-bottom:100px;
  border-radius:0px;
}
.credit-info {
  width:100%;
  height:auto;
  padding-bottom:100px;
  border-radius:0px;
}
.pay-btn {
  border-radius:0px;
}
}
     </style>
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
     <li><a href="travel.php"id=""><i class="fas fa-plane"></i> Travel Now</a></li>
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
           <th scope="col">מספר סיריאלי</th>
           <th scope="col">עסקה</th>
           <th scope="col">מחיר</th>
         </tr>
       </thead>
       <tbody id="items">

       </tbody>
     </table>

<div>

<br>
<br>

  <div class="inline"style="width:200px;"align="center">
    <div class="row">

    <h2 id="total"></h2>
    <br>
    <button type="submit"data-toggle="modal" data-target="#payment" class="btn btn-success" style="height:35px; width:200px;">Pay Now</button>
    <h2></h2>
     </div>
</div>






<script>

var items='';
var total=0;
$.getJSON("getCartitems.php",function(data){
    $.each(data,function(key,value){

       items+='<tr>';
       items+='<th scope="row">';
       items+=' <form class="" action="dropItemFromCart.php" method="get">';
       items+='<button type="submit" class="btn btn-success" style="height:35px; width:35px;"><i class="fas fa-trash-alt"></i></button>';
       items+='<input type="hidden" name="ser" value="'+value.ser+'">';
       items+='</form>';
       items+='</th>';
       items+='<td>'+value.ser+'</td>';
       items+='<td>'+value.discription+'</td>';
       items+='<td>'+value.price+'</td>';
       items+='</tr>';
       total+=parseInt(value.price);

     });


     $('#items').append(items);
     document.getElementById("total").innerHTML ="Total : "+ total+" $";

  });

</script>




<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"style="width:550px;">
    <div class="modal-content"style="width:550px;">

      <div class="modal-body"style="width:550px;">
        <div class='credit-info'style="height:480px; width:500px;">
          <div class='credit-info-content'>
            <table class='half-input-table'>
              <tr><td>Please select your card: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                <div class='dropdown-select'>
                <ul>
                  <li>Master Card</li>
                  <li>American Express</li>
                  </ul></div>
                </div>
               </td></tr>
            </table>
            <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
            Card Number
            <input class='input-field'></input>
            Card Holder
            <input class='input-field'></input>
            <table class='half-input-table'>
              <tr>
                <td> Expires
                  <input class='input-field'></input>
                </td>
                <td>CVC
                  <input class='input-field'></input>
                </td>
              </tr>
            </table>
            <br>
            <br>
            <form class="" action="buyItems.php" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:grey;">Cancel</button>
            <button type="submit" class="btn btn-success">Pay Now</button>

            </form>

      </div>
      </div>
      </div>

    </div>
  </div>
</div>


   </body>
 </html>
