<?php

session_start();
if(!isset($_SESSION['email'])){

  header("location:index.php");

}


if(!isset($_SESSION['addedReview'])&&!isset($_SESSION['addedComment'])){

    $_SESSION['hotelNumber']=$_GET['hotelIdForFeedBack'];

}

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">

   <link rel="stylesheet" href="../styles/hotels.css">
   <link rel="stylesheet" href="../styles/cars.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <title>Hotel Reviews</title>
 </head>
   <body>

     <style media="screen">
     .btn0,#btn3,#btn4 {
         background-color: DodgerBlue;
         border: none;
         color: white;
         border-radius: 3em;
         font-size: 12px;
         cursor: pointer;
         height: 25px;
         width: 80px;
     }
     #btn4{
         background-color: DodgerBlue;
         border: none;
         color: white;
         border-radius: 3em;
         font-size: 12px;
         cursor: pointer;
         height: 30px;
         width: 90px;
     }
     #btn3{
         background-color: DodgerBlue;
         border: none;
         color: white;
         border-radius: 3em;
         font-size: 12px;
         cursor: pointer;
         height: 30px;
         width: 130px;
     }
     /* Darker background on mouse-over */
     .btn0:hover {
         background-color: RoyalBlue;
     }

     #btn3:hover {
         background-color: RoyalBlue;
     }
     #btn4:hover {
         background-color: RoyalBlue;
     }

     </style>
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

     <br>
     <br>

     <section class="section section-free"style="z-index:-1;">
     <div class="container">
     <h1 style="text-align:center;color:white;font-weight:bold;">Chosen Hotel Reviews</h1>
     </div>
     </section>
<br>

<div class="container">
<button  id="tstBtn" type="button" class="btn btn-success" data-toggle="modal" data-target="#hotelNewReviewFModal">
  <i class="fas fa-plus-square"></i> Add Review
</button>
</div>
<br>

<div id="allReviews"></div>

<script>

var items='';
$.getJSON("getHotelFeedBack.php",function(data){
    $.each(data,function(key,value){
      var comments=value.comments.split('***');

      i=0;
      var stars='';
      while(i<parseInt(value.grading)){
      stars+="⭐";
      i++;
      }
      let j=0;

    items+='<div class="container">';
    items+='<div class="row"><table style="font-size:14px;" >';
    items+='<tr><td></td><td style="padding-left:30px;"><h2 style="font-weight: bold;">'+value.Email+'</h2><p style="font-size:12px;">'+value.postDate+'<p><p style="font-size:12px;">'+"Grading: "+stars+'<p>';
    items+='<p style="padding-right:80px;">'+value.feedBack+'</p>';
    items+='<br>';
    items+=' <hr>';
    while (j<comments.length-1) {
      items+='<p style="padding-right:80px;color:#ffa31a;"><i class="fas fa-comments"></i>'+"  "+comments[j]+'</p>';
      j++;
    }
    items+='<br></td><td style="padding-left:30px;padding-right:30px;padding-top:20px;">';
    items+='<div class="text-right">';
    items+='<br>';
    items+='<br>';
    items+='<br>';
    items+='<br>';
    items+='<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#addCommentModal" onclick="openComment('+value.number+');">Comment <i class="fas fa-comments"></i></button>';
    items+='</div>';
    items+='</td></tr></table></div></div>';
    items+='<br>';

     });

     $('#allReviews').append(items);

  });



function openComment(number){

document.getElementById("reviewNumber").value=number;

}



</script>
<!-- Modal -->
<div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="commentForm" action="addComment.php" method="get">
        <input type="hidden" name="revNum" id="reviewNumber" value="">
        <label for="comment">Write Your Comment :</label>
        <textarea class="form-control" name="comment"></textarea>
        <br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="commentForm">Post</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="hotelNewReviewFModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="hotelNewReviewForm" action="addHotelRivew.php" method="get">
        <label for="comment">Write Your review</label>
        <textarea class="form-control" name="review"></textarea>
        <br>
        <input type="radio" name="grade" value="1" /> 1
        <input type="radio" name="grade" value="2" /> 2
        <input type="radio" name="grade" value="3" /> 3
        <input type="radio" name="grade" value="4" /> 4
        <input type="radio" name="grade" value="5" /> 5
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="hotelNewReviewForm">Save changes</button>
      </div>
    </div>
  </div>
</div>


   </body>
 </html>
