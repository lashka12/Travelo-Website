
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
<link rel="stylesheet" href="../styles/travelPageStyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<title>Find Flights</title>

<style>
* {box-sizing: border-box;}
.mySlides {display: none;}
.mySlides2 {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.active {
  background-color: #717171;
}

/* Fading animation */
#ss1 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3.5s;
  animation-name: fade;
  animation-duration: 3.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}



.fc [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
    cursor: pointer;
}
.fc {
    overflow: hidden;
    position: relative;
}
.inline {
  display: inline;
}

</style>






</head>




<body>

  <script>

  var cities;

  $.getJSON("getCities.php",function(data){

      $.each(data,function(key,value){

      cities+='<option>'+value.Name+'</option>';

      });


        $('#allCities10').append(cities);
        $('#allCities1').append(cities);
        $('#allCities2').append(cities);
        $('#allCities3').append(cities);



    });

  </script>


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


<li><a href="homePage.php"><image src="../SysPictures/plane.png" height=25px width=30px;> Travelo</a></li>
<li><a href=""id="main-tab"><i class="fas fa-plane"></i> Travel Now</a></li>
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


<body>





<br>
<br>

<div id="mySidenav" class="sidenav">
  <a href="#" id="about">About</a>
  <a href="#" id="blog">Blog</a>

</div>


<section class="section section-free"style="z-index:-1;">
<div class="container">
<h2 style="text-align:center;color:white;font-weight:bold;">Free, easy & fast car rental and airport transfer comparison</h2>
</div>
</section>
<br>

<section class="section ">

  <div class="container"style="vertical-align: middle;text-align:center;">

  <form class="form-inline" style="vertical-align: middle;">
    <div class="form-group mb-2">
      <input type="text"  placeholder=" e.g. Apartments in Paris, Eiffle Tower, etc." style="height:45px; width:330px;">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <input type="date"  placeholder="Check-in"style="height:45px; width:155px;"value="2018-12-10">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <input type="date" placeholder="Check-out"style="height:45px ;width:155px;"value="2018-12-17">
    </div>
    <div class="form-group mb-2">
      <input type="text" placeholder=" Adults" style="height:45px; width:90px;">
    </div>
    <button type="submit" class="btn btn-primary mb-2" style="height:45px; width:90px;">Search <i class="fas fa-search"></i></button>
  </form>
</div>

</section>








<br>
<br>
<br>
<br>
<br>




<section class="section section-b">


<br>
<div class="container">
<div class="row">


  <table style="font-size:14px;" >
<tr>
<td>





</td>
<td style="padding-left:30px;">

<h2 style="font-weight: bold;">Duke Of Leinster Hotel</h2>
<p style="font-size:10px;">⭐⭐⭐⭐ 8.3 <p>
<p style="padding-right:80px;">Duke of Leinster is an elegant hotel situated in Bayswater, just a few minutes from Hyde Park, Kensington Gardens, lively Queensway and 2 Underground stations: Bayswater and Queensway</p>
<p style="color:#ffa31a;">👨‍ Marlowe451 : ' Great location, really pleasant and clean rooms '</p>


<p class="inline"style="color:#ffa31a;" id="hiddenText1" ></p>
<p  style="visibility: hidden;"class="inline"data-toggle="modal" data-target="#picModel1">&nbsp&nbsp<i class="fas fa-eye"id="hiddenEye1"></i> </p>
</td>


<td style="padding-left:30px;padding-right:30px;padding-top:20px;">
  <p style="color:#ffa31a;">last book : 43 min ago 🕒</p>

  <div class="btn-group"style="padding-bottom:5px;">
      <button id="likebtn" type="button" class="btn btn-primary" style="height:50px; "onclick="like()">👍</button>
      <button id="dislikebtn" type="button" class="btn btn-primary" style="height:50px;"onclick="dislike()">👎</button>
      <button id="rate" type="button" class="btn btn-primary" style="height:50px; width:116px;">9231</button>


     <script >

     function like(){

     }
     function dislike(){


     }

     </script>


    </div>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='https://en.wikipedia.org/wiki/Duke_of_Leinster'"><i class="fa fa-home"></i> Visit</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-comment"></i> Leave Feedback</button>

</td>


</tr>
</table>

</div>
</div>

<br>
<div class="container">
<div class="row">


  <table style="font-size:14px;" >
<tr>

<td>



  </div>





</td>
<td style="padding-left:30px;">

  <h2 style="font-weight: bold;">Taba Hotel & Nelson Village</h2>
<p style="font-size:10px;">⭐⭐⭐⭐⭐ 9.1 <p>
<p style="padding-right:80px;">Taba Hotel & Nelson Village features panoramic Gulf of Aqaba views and a private beach area with sun loungers. The bright, spacious rooms have cable TV and plush beds.</p>
<p style="color:#ffa31a;">👩‍‍ Sandi Black : ' We ate here on our last day in Dahab with our two kids '</p>
<p class="inline"style="color:#ffa31a;" id="hiddenText2" ></p>
<p  style="visibility: hidden;"class="inline"data-toggle="modal" data-target="#picModel2">&nbsp&nbsp<i class="fas fa-eye"id="hiddenEye2"></i> </p>

</td>


<td style="padding-left:30px;padding-right:30px;padding-top:20px;">
  <p style="color:#ffa31a;">last book : 1h ago 🕒</p>

  <div class="btn-group"style="padding-bottom:5px;">
      <button id="likebtn2" type="button" class="btn btn-primary" style="height:50px; "onclick="like1()">👍</button>
      <button id="dislikebtn2" type="button" class="btn btn-primary" style="height:50px;"onclick="dislike1()">👎</button>
      <button id="rate2" type="button" class="btn btn-primary" style="height:50px; width:116px;">5420</button>




    </div>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='https://en.wikipedia.org/wiki/Duke_of_Leinster'"><i class="fa fa-home"></i> Visit</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal2"><i class="fa fa-comment"></i> Leave Feedback</button>

</td>


</tr>
</table>

</div>
</div>


<br>
</section>
<br>
<br>

<section class="section section-main">


<div class="wrap"style="background: rgba(0, 0, 0, 0.5); color: #f1f1f1;border-radius: 2em;padding:20px;">


  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button" onclick="openCity('Find Flights')">🔍 Find Flights</button>
    <button class="w3-bar-item w3-button" onclick="openCity('Find Hotels')">🏨 Hotel</button>
    <button class="w3-bar-item w3-button" onclick="openCity('Car Rental')">🚘 Car Rental</button>
  </div>

  <div id="Find Flights" class="w3-container w3-display-container city">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>

<br>
<br>




<h1>From</h2>

<select id="allCities1"class="form-control">
</select>

    <br>
    <input id="flightDep" type="date" class="form-control" placeholder="Departure"value="2018-11-02">
    <br>
    <br>

    <h1>To</h2>
    <select id="allCities2" class="form-control">

    </select>    <br>

    <input id="flightRet"type="date" class="form-control" placeholder="Return"value="2018-11-19">
    <br><br>


    <div class="wrapper">

  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#flightsModal"onclick="fillFlights()">Find Flights</button>


  <script>

      function fillFlights(){

//                var from= $('#allCities1').val();
//                var to= $('#allCities2').val();
//                var choosenDep = Date.parse($('#flightDep').val());
//                var choosenAr = Date.parse($('#flightRet').val());
//
//               $('#flights-modal-title').append(from+' → '+to);
//
//                 $.getJSON('flights.json', function(data) {
//                   var flightsData='';
//                     $.each(data,function(key,value){
//
//                        if(($("#allCities1").val()==value.from)&&($("#allCities2").val()==value.to)){
//
//                               if((choosenDep==Date.parse(value.departureDate))&&(choosenAr==Date.parse(value.arrivalDate))){
//
//
//
//                       flightsData+='<tr>';
//                     //  flightsData+='<td height="60">'+value.flightNumber+'</td>';
//                       flightsData+='<td height="60">'+value.airLine+'</td>';
//                       flightsData+='<td height="60">'+value.departureDate+' '+value.departureDay+'</td>';
//                       flightsData+='<td height="60">'+value.arrivalDate+' '+value.arrivalDay+'</td>';
//                       flightsData+='<td height="60">'+value.airPort+'</td>';
//                       flightsData+='<td height="60">'+value.direct+'</td>';
//                       flightsData+='<td height="60">'+value.price+'</td>';
//                       flightsData+='<td height="60"><button class="btn" style="background-color: #ffbf80;">Buy Ticket</button></td>';
//                       flightsData+='</tr>';
//                     }
// }
//
//
//                   });
//
//                   var tableHeader='';
//
//                   tableHeader+= '<tr>';
//                 //  tableHeader+=  '<th>Flight</th>';
//                   tableHeader+=  '<th>AirLine</th>';
//                   tableHeader+=  '<th>Departure</th>';
//                   tableHeader+=  '<th>Arrival</th>';
//                   tableHeader+=  '<th>Terminal</th>';
//                   tableHeader+=  '<th>Direct</th>';
//                   tableHeader+=  '<th>price</th>';
//                   tableHeader+= '</tr>';
//
//                $('#flightsTable').append(tableHeader);
//                $('#flightsTable').append(flightsData);
//
//
//                 });


      }






  </script>






    </div>


  </div>

  <form action="../System/hotels.php" method="get">


  <div id="Find Hotels" class="w3-container w3-display-container city" style="display:none">
<br>
City
<select id="allCities3"class="form-control"name="city">
</select>
<br>

    <div class="dropdown"style="background-color: Transparent; border: none;">
      Check in
      <input id="checkIn"type="date" class="form-control"value="2018-12-10"name="fromDate">

      <br>
      Check out
      <input id="checkOut" type="date" class="form-control"value="2018-12-10"name="toDate">
      <br>
      Adults
      <select id="Adults" class="form-control"name="adults">
        <option>1</option>
        <option>2</option>

      </select>
      <br>
      Children
      <select id="Children" class="form-control"name="kids">
        <option>1</option>
        <option>2</option>
        <option>3</option>

      </select>
      <br>
      Stars ★
      <select id="stars" class="form-control"name="stars">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>

      </div>


<br>
    <div class="wrapper">
      <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#hotelsModal">Find Hotels</button>

          </div>
        </div>

</form>




      <script>

      var cities;

      $.getJSON("getCities.php",function(data){

          $.each(data,function(key,value){

          cities+='<option>'+value.Name+'</option>';

          });


            $('#allCities10').append(cities);
            $('#allCities1').append(cities);
            $('#allCities2').append(cities);
            $('#allCities3').append(cities);



        });

      </script>

      <script>

          function fillHotels(){

        //     var date1 = new Date($('#checkIn').val());
        //     var date2 = new Date($('#checkOut').val());
        //     var one_day=1000*60*60*24;    // Convert both dates to milliseconds
        //     var date1_ms = date1.getTime();
        //     var date2_ms = date2.getTime();    // Calculate the difference in milliseconds
        //     var difference_ms = date2_ms - date1_ms;        // Convert back to days and return
        //
        //
        //
        // if(date2_ms>date1_ms){


                //     $.getJSON('hotels.json', function(data) {
                //
                //       var hotelsData='';
                //         $.each(data,function(key,value){
                //            if($('#allCities3').val()==value.city){
                //               if($('#stars').val()==value.stars){
                //
                //           hotelsData+='<tr>';
                //           hotelsData+='<td height="60">'+value.name+'</td>';
                //           hotelsData+='<td height="60">'+value.city+'</td>';
                //           hotelsData+='<td height="60">'+$('#checkIn').val()+'</td>';
                //           hotelsData+='<td height="60">'+$('#checkOut').val()+'</td>';
                //           hotelsData+='<td height="60">'+value.stars+'</td>';
                //           hotelsData+='<td height="60">'+(Math.round(difference_ms/one_day)*($('#Adults').val()*parseInt(value.adultPricePerDay)+$('#Children').val()*parseInt(value.childPricePerDay)))+'$</td>';
                //           hotelsData+='<td height="60"><button class="btn" style="background-color: #ffbf80;">Order Now</button></td>';
                //           hotelsData+='</tr>';
                //
                //          } //if
                //
                //     }
                //
                //
                // }); //each
                //
                //       var tableHeader='';
                //       tableHeader+= '<tr>';
                //       tableHeader+=  '<th>HotelName</th>';
                //       tableHeader+=  '<th>City</th>';
                //       tableHeader+=  '<th>Check in</th>';
                //       tableHeader+=  '<th>Check out</th>';
                //       tableHeader+=  '<th>Stars</th>';
                //       tableHeader+=  '<th>Price</th>';
                //       tableHeader+= '</tr>';
                //
                //
                //    $('#hotelsTable').append(tableHeader);
                //    $('#hotelsTable').append(hotelsData);
                //
                //
                //     });
                //
                //


//           }
//
//
//           else{
//
//             var mass = document.getElementById("mass");
//             mass.innerHTML = "Check in Date Must be Before Check out Date";
// }





}

      </script>



  <div id="Car Rental" class="w3-container w3-display-container city" style="display:none">

    <br>
    <br>
    Pick-up Location
    <select id="allCities10"class="form-control">
    </select>

    <script>


    //
    // var ages;
    // $.getJSON('ageCategory.json', function(data) {
    //
    //     $.each(data,function(key,value){
    //
    //       ages+='<option>'+value.age+'</option>';
    //
    //
    //   });
    //
    //   $('#allAges').append(ages);
    //
    //
    // });
    //
    //
    //
    //
    //
    //
    //
    //
    // var cities;
    // // $.getJSON('countries.json', function(data) {
    // //
    // //     $.each(data,function(key,value){
    // //
    // //         for (i = 0; i < value.cities.length; i++) {
    // //
    // //              cities+='<option>'+value.cities[i]+'</option>';
    // //
    // //         }
    // //
    // //   });
    // //
    // //   $('#allCities10').append(cities);
    // //
    // //
    // //
    // //
    // //
    // // });


    </script>


    <br>
    From
    <input id="carFrom" type="date" class="form-control" value="2018-12-10">

    <br>
    To
    <input id="carTo"type="date" class="form-control" value="2018-12-10" >
    <br>
    Age
    <select id="allAges"class="form-control">
    </select>
    <br>

    <div class="wrapper">
      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#carsModal"onclick="fillCars()">Find Car</button>
    </div>
  </div>


  <script>

      function fillCars(){

        var date1 = new Date($('#carFrom').val());
        var date2 = new Date($('#carTo').val());
        var one_day=1000*60*60*24;    // Convert both dates to milliseconds
        var date1_ms = date1.getTime();
        var date2_ms = date2.getTime();    // Calculate the difference in milliseconds
        var difference_ms = date2_ms - date1_ms;        // Convert back to days



    if(date2_ms>date1_ms){

            //     $.getJSON('cars.json', function(data) {
            //       var carsData='';
            //         $.each(data,function(key,value){
            //           var ageFound=0;
            //
            //          if(value.pickUpCity== $('#allCities10').val()){
            //
            //           for (i = 0; i < value.age.length; i++) {
            //             if( value.age[i]==$('#allAges').val())
            //             ageFound=1;
            //           }
            //
            //
            //         if(ageFound==1){
            //
            //          carsData+='<tr>';
            //          carsData+='<td height="60">'+value.company+'</td>';
            //          carsData+='<td height="60">'+value.car+'</td>';
            //          carsData+='<td height="60">'+value.seats+'</td>';
            //          carsData+='<td height="60">'+value.automatic+'</td>';
            //          carsData+='<td height="60">'+((Math.round(difference_ms/one_day))*(parseInt(value.basePrice)))+'$</td>';
            //          carsData+='<td height="60"><button class="btn" style="background-color: #ffbf80;">Pay now</button></td>';
            //          carsData+='</tr>';
            //
            //
            //         }
            //
            //       }
            //
            //
            // }); //each
            //
            //       var tableHeader='';
            //       tableHeader+= '<tr>';
            //       tableHeader+=  '<th>Company</th>';
            //       tableHeader+=  '<th>Car</th>';
            //       tableHeader+=  '<th>Seats</th>';
            //       tableHeader+=  '<th>Automatic</th>';
            //      tableHeader+=  '<th>Price</th>';
            //       tableHeader+= '</tr>';
            //
            //
            //    $('#carsTable').append(tableHeader);
            //    $('#carsTable').append(carsData);
            //
            //
            //     });




      }


else{

  var mass = document.getElementById("mass2");
  mass.innerHTML = "Pick-up Date Must be Before Return Date";




}



}


  </script>




  <script>
  function openCity(cityName) {
      var i;
      var x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      document.getElementById(cityName).style.display = "block";
  }
  </script>

</section>

<br>
<br>
<br>
<br>
<br>
<br>
<button type="button" <?php if($_SESSION['email']!="Admin") {?> style="display: none;" <?php } ?> class="btn btn-primary btn-lg btn-block" style="width:240px; ;text-align: center;  margin:0 auto;" onclick="uploadSale()">Upload Flights On Sale</button>


<script>


function uploadSale(){

  $.getJSON('flightsOnSale.json', function(data) {

    var dis1 = document.getElementById("dis1");
    dis1.innerHTML = data[0].distination;
    var dates1 = document.getElementById("dates1");
    dates1.innerHTML = data[0].dates;
    var days1 = document.getElementById("days1");
    days1.innerHTML = data[0].days;
    var price1 = document.getElementById("price1");
    price1.innerHTML = data[0].newPrice+"$";
    $('#price1').append('&nbsp;&nbsp;&nbsp;<strike style="color:red;">'+data[0].oldPrice+'$</strike>');



    var dis2 = document.getElementById("dis2");
    dis2.innerHTML = data[1].distination;
    var dates2 = document.getElementById("dates2");
    dates2.innerHTML = data[1].dates;
    var days2 = document.getElementById("days2");
    days2.innerHTML = data[1].days;
    var price2 = document.getElementById("price2");
    price2.innerHTML = data[1].newPrice+"$";
    $('#price2').append('&nbsp;&nbsp;&nbsp;<strike style="color:red;">'+data[1].oldPrice+'$</strike>');


    var dis3 = document.getElementById("dis3");
    dis3.innerHTML = data[2].distination;
    var dates3 = document.getElementById("dates3");
    dates3.innerHTML = data[2].dates;
    var days3 = document.getElementById("days3");
    days3.innerHTML = data[2].days;
    var price3 = document.getElementById("price3");
    price3.innerHTML = data[2].newPrice+"$";
    $('#price3').append('&nbsp;&nbsp;&nbsp;<strike style="color:red;">'+data[2].oldPrice+'$</strike>');



    var dis4 = document.getElementById("dis4");
    dis1.innerHTML = data[3].distination;
    var dates4 = document.getElementById("dates4");
    dates4.innerHTML = data[3].dates;
    var days4 = document.getElementById("days4");
    days4.innerHTML = data[3].days;
    var price4 = document.getElementById("price4");
    price4.innerHTML = data[3].newPrice+"$";
    $('#price4').append('&nbsp;&nbsp;&nbsp;<strike style="color:red;">'+data[3].oldPrice+'$</strike>');


  });



}

</script>


  <br>

<section class="section section-b">
<div class="container">

<div class="row">
<div class="column" >
<h2 id="dis1">London </h2>
<p id="dates1">10/11 ✈ 19/11</p>
<p id="days1">Sunday ✈ Friday</p>

<p id="price1"style="color: green;font-weight:bold"><strike style="color:red;">630$</strike>&nbsp;&nbsp;&nbsp;420$</p>

<div class="wrapper">
<button class="btn" style="background-color: #ffbf80;">Buy Ticket</button>
</div>
</div>

<div class="column"style="background-color:#b3cce6;  background: rgba(0, 0, 0, 0.2);">

<h2 id="dis2">Larnaca</h2>
<p id="dates2">11/12 ✈ 22/12</p>
<p id="days2">Thursday ✈ Monday</p>
<p id="price2"style="color: green; font-weight:bold"><strike style="color:red;">710$</strike>&nbsp;&nbsp;&nbsp;530$</p>

<div class="wrapper">
<button class="btn" style="background-color: #ffbf80;">Buy Ticket</button>
</div>
</div>
<div class="column"style="background-color:#b3cce6;  background: rgba(0, 0, 0, 0.2);">

<h2 id="dis3">Rome</h2>
<p id="dates3">11/12 ✈ 22/12</p>
<p id="days3">Thursday ✈ Monday</p>
<p id="price3" style="color: green; font-weight:bold"><strike style="color:red;">710$</strike>&nbsp;&nbsp;&nbsp;530$</p>

<div class="wrapper">
<button class="btn" style="background-color: #ffbf80;">Buy Ticket</button>
</div>
</div>
<div class="column"style="background-color:#b3cce6;  background: rgba(0, 0, 0, 0.2);">

<h2 id="dis4">Milan</h2>
<p id="dates4">11/12 ✈ 22/12</p>
<p id="days4">Thursday ✈ Monday</p>
<p id="price4"style="color: green; font-weight:bold"><strike style="color:red;">630$</strike>&nbsp;&nbsp;&nbsp;430$</p>

<div class="wrapper">
<button class="btn" style="background-color: #ffbf80;">Buy Ticket</button>
</div>
</div>


</div>
</div>


</div>

</section>


<br>
<br>
<br>






















<section class="section section-c">


<div class="container">
<h2 style="text-align:center;">Find the right flight</h2>
<p style="text-align:center;"> Search hundreds of other travel sites at once</p>
<p style="text-align:center;"> Book with confidence with Price Forecast</p>
<p style="text-align:center;"> Set a Price Alert and never miss a deal</p>
<br>

<div class="wrapper">
<button class="btn" style="background-color: #ffbf80;">Serach Now</button>
</div>
</div>
</section>


<section class="section section-d">



<div class="row"style="padding:30px;text-align:center;">


<ul class="main-nav">
<li><a href="homePage.html">Flights to Amsterdam</a></li>
<li><a href="profile.html">Flights to Berlin</a></li>
<li><a href="#">Hotels in Barcelona</a></li>
<li><a href="">Car Rental in Prague</a></li>
<li><a href="">Hotels in Madrid</a></li>
<li><a href="index.html">Find More</a></li>
</ul>



</div>


</div>
</section>

<div class="modal fade" id="myModal2" role="dialog" style="z-index:20000000;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Write your feedback</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comm2"class="form-control" rows="5" id="comment"></textarea>
            <br>
            <br>


       <div style="text-align:center;">
            <h4 class="modal-title">Add pictures</h4>
            <br>

            <label class="fc">

            <input  class="btn0" type='file' onchange="readURL2(this);" />
              <img id="bla" src="../SysPictures/plus.png" alt="your image"style="height:80px; widt:80px;" />
            </label>

          <script>
            function readURL2(input) {
                  if (input.files && input.files[0]) {
                      var reader2 = new FileReader();

                      reader2.onload = function (e) {
                         $('#modPic2').attr('src', e.target.result);
                         $('#bla').attr('src', e.target.result);

                      };

                      reader2.readAsDataURL(input.files[0]);
                  }
              }
          </script>

        </div>



          </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="feedBackPost2()">Post</button>

       <script>


     function feedBackPost2(){


              if(document.getElementById("comm2").value != ""){
              document.getElementById("hiddenText2").textContent="👨‍ Admin : ' "+document.getElementById("comm2").value+" '";
              document.getElementById("hiddenEye2").style.visibility = "visible";




            }
            else {

              document.getElementById("hiddenText2").textContent="👨‍ Admin : Added a picture ";
              document.getElementById("hiddenEye2").style.visibility = "visible";


            }
            document.getElementById("com2").value="";



     }

       </script>

        </div>
      </div>

    </div>
  </div>




<div class="modal fade" id="myModal" role="dialog" style="z-index:20000000;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Write your feedback</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comm"class="form-control" rows="5" id="comment"></textarea>
            <br>
            <br>


       <div style="text-align:center;">
            <h4 class="modal-title">Add pictures</h4>
            <br>

            <label class="fc">

            <input  class="btn0" type='file' onchange="readURL(this);" />
              <img id="blah" src="../SysPictures/plus.png" alt="your image"style="height:80px; widt:80px;" />
            </label>

          <script>
            function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                         $('#modPic1').attr('src', e.target.result);
                         $('#blah').attr('src', e.target.result);

                      };

                      reader.readAsDataURL(input.files[0]);
                  }
              }
          </script>

        </div>

          </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="feedBackPost()">Post</button>

       <script>


     function feedBackPost(){


       if(document.getElementById("comm").value != ""){
       document.getElementById("hiddenText1").textContent="👨‍ Admin : ' "+document.getElementById("comm").value+" '";
       document.getElementById("hiddenEye1").style.visibility = "visible";




     }
     else {

       document.getElementById("hiddenText1").textContent="👨‍ Admin : Added a picture ";
       document.getElementById("hiddenEye1").style.visibility = "visible";


     }
     document.getElementById("comm").value="";



     }

       </script>

        </div>
      </div>

    </div>
  </div>










  <div class="modal fade" id="flightsModal" role="dialog" style="z-index:20000000;"data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog"style="width: 1200px;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="clearFlightsTable()">&times;</button>
            <h4 id="flights-modal-title"class="modal-title"> </h4>
          </div>

          <div class="modal-body">


            <table id="flightsTable"style="width:100%">

            </table>

            </div>

            <div class="modal-footer">


          <script>
                  function clearFlightsTable(){
                    var Table = document.getElementById("flightsTable");
                    Table.innerHTML = "";
                    var header = document.getElementById("flights-modal-title");
                    header.innerHTML = "";


                 }


          </script>


           </div>

            </div>
           </div>

        </div>
        <div class="modal fade" id="carsModal" role="dialog" style="z-index:20000000;"data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog"style="width: 1200px;">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" onclick="clearCarsTable()">&times;</button>

                </div>

                <div class="modal-body">
                <p id="mass2"style="text-align:center;">   </p>

                  <table id="carsTable"style="width:100%">

                  </table>

                  </div>

                  <div class="modal-footer">


                <script>
                        function clearCarsTable(){
                          var Table = document.getElementById("carsTable");
                          Table.innerHTML = "";
                          var mass = document.getElementById("mass2");
                          mass.innerHTML = "";

                       }


                </script>


                 </div>

                  </div>
                 </div>

              </div>


        <div class="modal fade" id="hotelsModal" role="dialog" style="z-index:20000000;"data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog"style="width: 1200px;">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" onclick="clearHotelsTable()">&times;</button>

                </div>

                <div class="modal-body">
                <p id="mass"style="text-align:center;">   </p>

                  <table id="hotelsTable"style="width:100%">

                  </table>

                  </div>

                  <div class="modal-footer">


                <script>
                        function clearHotelsTable(){
                          var Table = document.getElementById("hotelsTable");
                          Table.innerHTML = "";
                          var mass = document.getElementById("mass");
                          mass.innerHTML = "";

                       }


                </script>


                 </div>

                  </div>
                 </div>

              </div>























  <div class="modal fade" id="picModel1" role="dialog" style="z-index:20000000;">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">


              <div style="text-align:center;">
              <img src="" id="modPic1" alt="Add picture on feedBack page" class="avatar" style=" width:500px;height:500px;">
            </div>

            </div>
           </div>

        </div>

      </div>
    </div>


    <div class="modal fade" id="picModel2" role="dialog" style="z-index:20000000;">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">


                <div style="text-align:center;">
                <img src="" id="modPic2" alt="Add picture on feedBack page" class="avatar" style=" width:500px;height:500px;">
              </div>

              </div>
             </div>

          </div>

        </div>
      </div>



</body>

<footer> <p>Copyright © Information Systems (Lorans Ashkar + Shiraz Fero) Travelo Inc. All Rights Reserved. Accessibility, User Agreement, Privacy, Cookies and AdChoice</p>
</footer>

</html>
