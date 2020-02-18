<?php

session_start();

if(!isset($_SESSION['email'])){   // to block

  header("location:index.php");

}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../styles/profileStyle.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Find Flights</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

  <body>

    <header>
    <div class="row">

      <ul class="main-nav">
        <li style="padding-left:20px;">  <div class="dropdown"style="background-color: Transparent; border: none;">
          <button class="btn btn-primary dropdown-toggle" type="button"data-toggle="dropdown"style="background-color: Transparent;border: none; color: white;text-decoration: none; padding: 6px 20px;font-size: 16px;">
            <img src=../profilePictures/<?= $_SESSION['picUrl']?> id="avt2" alt="Avatar" class="avatar" style="border-radius:50%; width:40px;height:40px;">
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


    <style>
    *{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}


    .modal {

      display:none;
        z-index: 25
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      z-index: 25

        background-color: #fefefe;
        margin: 0.5% auto 7% auto;
        border: 1px solid #888;
        width: 30%;
        padding-bottom: 10px;
    }



    .animate {
        animation: zoom 0.6s
    }
    @keyframes zoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }


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



    </style>







    </header>




<body>






      <div class="container" style="z-index:-1;">



<br>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bought Tickits</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Hotel Reservation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Cars Rental</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
   <br>

     <div style="width: 100%; overflow: hidden;">
                  <div style="width: 600px; float: left;">

                    <table class="table" style="   table-layout: fixed;  width: 600px; float: left;">


                    <tr>
                    <td>Full Name</td>
                    <td><p id="nm"><?= $_SESSION['firstName']?> <?= $_SESSION['lastName']?></p></td>
                    </tr>


                    <tr>
                    <td>Birth date</td>
                    <td><p id="bd"><?= $_SESSION['birthDate']?></p></td>
                    </tr>

                    <tr>
                    <td>Email ✉</td>
                    <td><p id="em"><?= $_SESSION['email']?></p></td>
                    </tr>

                    <tr>
                    <td>Phone Number </td>
                    <td><p id="ph"><?= $_SESSION['phoneNumber']?></p></td>
                    </tr>

                    <tr>
                    <td>Address </td>
                    <td><p id="ad"><?= $_SESSION['address']?></p></td>
                    </tr>


                    <tr>
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#changePasswordModal" id="btn3">Change Password 🔒</button></td>
                    <td><button type="button" class="btn btn-info" onclick="document.getElementById('modal-wrapper').style.display='block'" id="btn4">Edit Profile ✎ </button></td>
                    </tr>
     </table>
   </div>






   <div style="margin-left: 620px;"> <img src=../profilePictures/<?= $_SESSION['picUrl']?> id="avt" alt="Avatar" class="avatar" style="border-radius:50%; width:180px;height:180px;">

     <form id="form1" runat="server" action="uploadProfilePicture.php" method="post" enctype="multipart/form-data">
       <label class="fileContainer">
       <button class="btn0"><i class="fa fa-upload"></i> Upload</button>
       <input type='file' id="imgInp" name="fileToUpload" class="inputfile" onchange="this.form.submit()"/>
      </label>
   </form>

      </div>



   </div></div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<br>

    <table id="flightsTbl" style="width:70%; text-align:center;">


    </table>



    <script>
    //
    //  var allFlights='';
    //
    //
    // $.getJSON('flights.json', function(data2) {
    //
    //       allFlights=data2;
    //
    // });
    //
    // var flightDat='';
    //
    //   $.getJSON('users.json', function(data) {
    //     for(var i = 0; i < data.users.length; i++){
    //           if(data.users[i].email==document.getElementById("em").textContent){
    //            for(var j = 0; j < data.users[i].flighsHistory.length; j++){
    //                   var flightId=data.users[i].flighsHistory[j];
    //                   for(var w = 0; w < allFlights.length; w++){
    //
    //                        if(allFlights[w].flightNumber==flightId){
    //
    //                             flightDat+='<tr>';
    //                             flightDat+='<td height="40" style="text-align:center;">'+allFlights[w].flightNumber+'</td>';
    //                             flightDat+='<td height="40" style="text-align:center;">'+allFlights[w].from+"→"+allFlights[w].to+'</td>';
    //                             flightDat+='<td height="40" style="text-align:center;">'+allFlights[w].departureDate+"→"+allFlights[w].arrivalDate+'</td>';
    //                             flightDat+='<td height="40" style="text-align:center;">'+allFlights[w].airLine+'</td>';
    //                             flightDat+='<td height="40" style="text-align:center;">'+allFlights[w].price+'</td>';
    //                             flightDat+='</tr>';
    //
    //
    //                        }
    //
    //
    //                   }
    //
    //            }
    //
    //       }
    //
    //
    //
    //     }
    //
    //
    //     var flightsH;
    //     flightsH+='<tr>';
    //     flightsH+='<th style="text-align:center;">Ticket</th>';
    //     flightsH+='<th style="text-align:center;">Directions</th>';
    //     flightsH+='<th style="text-align:center;">Dates</th>';
    //     flightsH+='<th style="text-align:center;">Airline</th>';
    //     flightsH+='<th style="text-align:center;">Price</th>';
    //     flightsH+='</tr>';
    //
    //     $('#flightsTbl').append(flightsH);
    //     $('#flightsTbl').append(flightDat);
    //
    //
    //
    //
    // });

    </script>











  </div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">

    <table id="hotelsTbl" style="width:70%; text-align:center;">


    </table>



    <script>

     var allHotels='';


    $.getJSON('hotels.json', function(data2) {

          allHotels=data2;

    });

  var hisHotels;

    $.getJSON('user.json', function(data3) {

          hisHotels=data3.hotelReservations;

    });



    var hotelData='';

      $.getJSON('hotelReservations.json', function(data) {
        for(var i = 0; i < data.length; i++){
              if(data[i].userEmail==document.getElementById("em").textContent){

                var city='';
                var stars='';
                for(var j = 0; j < allHotels.length; j++){

                 if(data[i].hotelName==allHotels[j].name){
                  city=allHotels[j].city;
                  stars=allHotels[j].stars;

                }

          }




          hotelData+='<tr height=40>';
          hotelData+='<td>'+data[i].hotelName+'</td>';
          hotelData+='<td>'+city+'</td>';
          hotelData+='<td>'+data[i].fromDate+"→"+data[i].toDate+'</td>';
          hotelData+='<td>'+stars+'</td>';
          hotelData+='<td>'+data[i].Paid+'</td>';
          hotelData+='</tr>';



        }

}

var hotelHeader='';
hotelHeader+='<tr height=40>';
hotelHeader+='<th style="text-align:center;">Name</th>';
hotelHeader+='<th style="text-align:center;">City</th>';
hotelHeader+='<th style="text-align:center;">Dates</th>';
hotelHeader+='<th style="text-align:center;">Stars</th>';
hotelHeader+='<th style="text-align:center;">Paid</th>';
hotelHeader+='</tr>';

        $('#hotelsTbl').append(hotelHeader);
        $('#hotelsTbl').append(hotelData);





    });

    </script>
  </div>

  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">


    <table id="carsTbl" style="width:70%; text-align:center;">


    </table>



    <script>



    var carsData='';

      $.getJSON('carRental.json', function(data) {
        for(var t = 0; t < data.length; t++){

          if(data[t].userEmail==document.getElementById("em").textContent){

          carsData+='<tr height=40>';
          carsData+='<td>'+data[t].carName+'</td>';
          carsData+='<td>'+data[t].fromDate+"→"+data[t].toDate+'</td>';
          carsData+='<td>'+data[t].paid+'</td>';
          carsData+='</tr>';



        }

  }
  carsHeader='';
  carsHeader+='<tr height=40>';
  carsHeader+='<th style="text-align:center;">Car</th>';
  carsHeader+='<th style="text-align:center;">Dates</th>';
  carsHeader+='<th style="text-align:center;">Paid</th>';
  carsHeader+='</tr>';

        $('#carsTbl').append(carsHeader);
        $('#carsTbl').append(carsData);





    });

    </script>





  </div>
</div>





</div>




    </div>



    </script>


<div id="footer">
  <p>Copyright © Information Systems (Lorans Ashkar) Travelo Inc. All Rights Reserved. Accessibility, User Agreement, Privacy, Cookies and AdChoice</p></div>

  <!-- Modal -->
  <div id="changePasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="padding: 20px; width:800px;">

      <!-- Modal content-->
      <div class="modal-content"style="padding: 20px; width:800px;">
        <div class="modal-header">
          <h3 class="modal-title">Change Password</h3>
        </div>

        <div class="modal-body">


<br>

     <form id="changePasswordForm"action="changePassword.php" method="get" onsubmit="return changePassword()">

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Password</label>
              <label  id='changePass1Err' style="color:red;"></label>
              <input name="changePass1" type="password" class="form-control" id="changePass1" placeholder="choose a storng password" title="enter your password" required>
            </div>

            <div class="form-group col-md-4">
              <label>Confirm Password</label>
              <label  id='changePass2Err' style="color:red;"></label>
              <input name="changePass2" type="password" class="form-control" id="changePass2" placeholder="confirm your Password" title="enter your password"required >
            </div>

            <div class="form-group col-md-4">
              <label>Old Password</label>
              <label  id='changePass3Err' style="color:red;"></label>
              <input name="changePass3" type="password" class="form-control" id="changePass3" placeholder="confirm your Password" title="enter your password"required >
            </div>

          </div>
    </form>

          <h6  style=" visibility: hidden;">-</h6>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"form="changePasswordForm"/>Save changes</button>
          <button type="button" class="btn btn-secondary" onclick="closeChangePassword()">Close</button>

        </div>
      </div>

    </div>
  </div>

<script>


function changePassword(){

  document.getElementById("changePass1Err").innerHTML = ""
  document.getElementById("changePass2Err").innerHTML = "";
  document.getElementById("changePass3Err").innerHTML = "";
  var pass1=document.getElementById("changePass1").value;
  var pass2=document.getElementById("changePass2").value;
  var cnfrmPass =document.getElementById("changePass3").value;
  var realPass =document.getElementById("hiddenPass").value;

          if(pass1.localeCompare(pass2)==0){
             if(!hasNonStandard(pass1)){
                 if(realPass==cnfrmPass){
                   return true;;
                 }else{
                   document.getElementById("changePass3Err").innerHTML = "Wrong Password";
                 }
             }else{
                 document.getElementById("changePass1Err").innerHTML = "passwords must contain only 0-9 , a-z ";
                 document.getElementById("changePass2Err").innerHTML = "passwords must contain only 0-9 , a-z ";
             }
          }else{
             document.getElementById("changePass1Err").innerHTML = "Password Does not Match";
             document.getElementById("changePass2Err").innerHTML = "Password Does not Match";
          }

        return false;
}


function closeChangePassword(){

  document.getElementById("changePass1").value="";
  document.getElementById("changePass2").value="";
  document.getElementById("changePass3").value="";

    $('#changePasswordModal').modal('hide')


}


</script>



  </body>




  <dialog id="modal-wrapper" class="modal">
    <div class="modal-content animate " style="padding: 20px; width:800px;">

    <div class="modal-header">
      <h3 class="modal-title">Edit Your Profile ✎</h3>

    </div>


    <div class="modal-body">

    <form id="myForm" method="get">

      <script src="../script/validate.js"></script>
          <br>
  <div class="form-row">
      <div class="form-group col-md-4">
        <label>First Name</label>
        <label  id='userNameErr' style="color:red; width:80px;"></label>
        <input name="newFirstName"  type="text" class="form-control" id="spUserName" placeholder="enter your full name" title="enter your Username" required>
      </div>

      <div class="form-group col-md-4">
        <label>Last Name </label>
        <label  id='LastNameErr' style="color:red;"></label>
        <input name="newLastName"  type="text" class="form-control" id="lastName" placeholder="enter your full name" title="enter your Username" required>
      </div>

      <div class="form-group col-md-4">
        <label>Birth date </label>
        <label  id='birthDateErr' style="color:red;"></label>
        <input name="newBirthDate" type="date" value="2013-01-08" class="form-control" id="Bdate"   required>

      </div>
  </div>


  <div class="form-row">

      <div class="form-group col-md-4">
        <label>Email</label>
        <label  id='emailErr' style="color:red;"></label>
        <input name="newEmail" type="email" class="form-control" id="email" placeholder="enter your email" title="enter your email" required readonly>
      </div>

      <div class="form-group col-md-4">
        <label>Phone Number</label>
        <label  id='phoneErr' style="color:red;"></label>
        <input name="newPhoneNumber" type="text" class="form-control" id="phone" placeholder="enter your phone number" title="enter your phone number" required>
      </div>


      <div class="form-group col-md-4">
        <label>Address</label>
        <label  id='addressErr' style="color:red;"></label>
        <input name="newAddress" type="text" class="form-control" id="adrs" placeholder="enter your Address" title="enter your Address" required>
      </div>

    </div>

  </form>
  <h6  style=" visibility: hidden;">-</h6>


    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="edit()">Save changes</button>
      <button type="button" class="btn btn-secondary" onclick="cl()">Close</button>
    </div>


  </div>





<script>

function cl(){


initErr();

  var modal=document.getElementById("modal-wrapper");
  modal.style.display = "none";

  var str = document.getElementById("nm").textContent;
  var res = str.split(" ");
  document.getElementById("spUserName").value=res[0];
  document.getElementById("lastName").value=res[1];
  document.getElementById("email").value=document.getElementById("em").textContent;
  document.getElementById("phone").value=document.getElementById("ph").textContent;
  document.getElementById("Bdate").value=document.getElementById("bd").textContent;
  document.getElementById("adrs").value=document.getElementById("ad").textContent;


}


   var str = document.getElementById("nm").textContent;
   var res = str.split(" ");
   document.getElementById("spUserName").value=res[0];
   document.getElementById("lastName").value=res[1];
   document.getElementById("email").value=document.getElementById("em").textContent;
   document.getElementById("phone").value=document.getElementById("ph").textContent;
   document.getElementById("Bdate").value=document.getElementById("bd").textContent;
   document.getElementById("adrs").value=document.getElementById("ad").textContent;




</script>



</dialog>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding: 20px; width:350px;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"style="align:center;">Confirm Your Password</h3>

      </div>
      <div class="modal-body">
        <form id="myForm2"action="editProfile.php" method="get" onsubmit="return checkPass()">


          <div class="form-group col-md-12">
            <label  id='cnfrmPassErr' style="color:red;"></label>
            <input id="cnfrmPass" type="password" class="form-control" placeholder="confirm your Password" title="enter your password"required >
          </div>



          <input type="hidden" id="newEmail" name="newEmail" >
          <input type="hidden" id="newFirstName" name="newFirstName" >
          <input type="hidden" id="newLastName" name="newLastName" >
          <input type="hidden" id="newBirthDate" name="newBirthDate" >
          <input type="hidden" id="newPhoneNumber" name="newPhoneNumber" >
          <input type="hidden" id="newPassword1" name="newPassword1" >
          <input type="hidden" id="newAddress" name="newAddress" >
          <input type="hidden" id="hiddenPass" value="<?= $_SESSION['password']?>" >



          <h6  style=" visibility: hidden;">Sign</h6>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Continue</button>
        <button type="button" class="btn btn-secondary" onclick="cancleConfirming()">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>


<script>
function cancleConfirming(){

document.getElementById("cnfrmPass").value="";
  $('#exampleModal').modal('hide')


}
function checkPass(){


  var realPass =document.getElementById("hiddenPass").value;
  var tmpPass=document.getElementById("cnfrmPass").value;

  if(realPass==tmpPass){
    return true;
  }

  document.getElementById("cnfrmPassErr").innerHTML="Wrong Password";
  return false;
}

</script>









</html>
