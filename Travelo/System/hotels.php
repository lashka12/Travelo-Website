<?php
session_start();
if(!isset($_SESSION['email'])){

  header("location:index.php");

}

if(isset($_SESSION['addedReview'])){
  unset($_SESSION['addedReview']);
}

if(isset($_SESSION['addedComment'])){
  unset($_SESSION['addedComment']);

}



if(isset($_GET['city'])){
$_SESSION['searchHotelCity']=$_GET['city'];
$_SESSION['searchHotelFromDate']=$_GET['fromDate'];
$_SESSION['searchHotelToDate']=$_GET['toDate'];
$_SESSION['searchHotelAdults']=$_GET['adults'];
$_SESSION['searchHotelKids']=$_GET['kids'];
$_SESSION['searchHotelStars']=$_GET['stars'];

}
else{

  if(!isset($_SESSION['hotelAdded'])){
  $_SESSION['searchHotelCity']="";
  $_SESSION['searchHotelFromDate']="2019-02-01";
  $_SESSION['searchHotelToDate']="2019-02-05";
  $_SESSION['searchHotelAdults']="";
  $_SESSION['searchHotelKids']="";
  $_SESSION['searchHotelStars']="";
}
else{
  unset($_SESSION['hotelAdded']);

}

}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../styles/hotels.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Hotels</title>
  </head>
  <body>
    <style>


    /*the container must be positioned relative:*/
    .autocomplete {
      position: relative;
      display: inline-block;
    }

    input {
      border: 1px solid transparent;
      background-color: #f1f1f1;
      padding: 10px;
      font-size: 16px;
    }

    input[type=text] {
      background-color: #f1f1f1;
      width: 100%;
    }

    input[type=submit] {
      background-color: DodgerBlue;
      color: #fff;
      cursor: pointer;
    }

    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      /*position the autocomplete items to be the same width as the container:*/
      top: 100%;
      left: 0;
      right: 0;
    }

    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
      background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
      background-color: DodgerBlue !important;
      color: #ffffff;
    }
    </style>


    <input type="hidden" id="hiddenAdults" value="<?= $_SESSION['searchHotelAdults']?>" >
    <input type="hidden" id="hiddenKids" value="<?= $_SESSION['searchHotelAdults']?>" >


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
    <li><a href=""id="main-tab"><i class="fas fa-hotel"></i> Hotels</a></li>
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








    <script>


    var hotels='';
    $.getJSON("getHotels.php",function(data){

        $.each(data,function(key,value){
        var id=value.id;
        var name=value.name;
        var discription=value.discription;
        var pic=value.mainPicture;
        i=0;
        var stars='';
        while(i<parseInt(value.stars)){
          stars+="⭐";
          i++;
        }

       var x=document.getElementById("hiddenAdults").value*value.adultPricePerDay;
       var y=document.getElementById("hiddenKids").value*value.childPricePerDay;
       var cost=(x+y)+" $";

       if(x==""){
         cost="";
       }

       var dis="";

       if(value.taken=="yes"){
       dis="disabled";

       }

       var hidden="";
       if(value.hidden=="yes"){
       hidden="display: none;";

       }



        hotels+='<div class="container"><div class="row"><table style="font-size:14px;" ><tr><td>   <div class="slideshow-container"><img src="../hotelsPictures/'+pic+'"style="width:230px;height:230px;padding:10px;"></div> </td> <td style="padding-left:30px;"><h2 style="font-weight: bold; value=">   '+name+' '+cost+ '</h2><p style="font-size:10px;">'+stars+'<p><p style="padding-right:80px;">'+discription+'</p>'
        +'</td><td style="padding-left:30px;padding-right:30px;padding-top:20px;"><p style="color:#ffa31a;"></p><br>'
        +'<form method="get" action="addHotelToShoppingCart.php">'
        +'<form method="get" action="addHotelToShoppingCart.php">'
        +'<input type="hidden" name="id" value="'+value.id+'">'
        +'<button '+dis+' type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px; '+hidden+'"><i class="fas fa-cart-arrow-down"></i> Add to Watch List</button>'
        +'</form>'
        +'<br>'
        +'<form id="" action="HotelReview.php" class="" method="get">'
        +'<input type="hidden" name="hotelIdForFeedBack" value="'+value.id+'">'
        +'<button type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px;">show Comments</button>'
        +'</form>'
        +'<br><br>'
        +'<br></td></tr></table></div></div><br>';



        });
        $('#hotels').append(hotels);

      });

;





    </script>







<br>
<br>

<section class="section section-free"style="z-index:-1;">
<div class="container">
<h2 style="text-align:center;color:white;font-weight:bold;">Search Easy & Fast Hotel Reservations and comparison</h2>
</div>
</section>
<br>



<section class="section ">

  <div class="container"style="vertical-align: middle;text-align:center;">
<!--Make sure the form has the autocomplete function switched off:-->
<form  class="form-inline" style="vertical-align: middle;" autocomplete="off" action="../System/hotels.php">
  <div class="autocomplete" style="width:200px;">
     <div class="form-group mb-2">
        <input id="cities" type="text" name="city" placeholder="City" style="height:45px; width:200px;"required>
    </div>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <input type="date"  name="fromDate"placeholder="Check-in"style="height:45px; width:170px;"value="2018-12-10">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="date" name="toDate"placeholder="Check-out"style="height:45px ;width:170px;"value="2018-12-17">
  </div>
  <div class="form-group mb-2">
    <input type="text" name="adults"placeholder=" Adults" style="height:45px; width:90px;"required>
  </div>
  <div class="form-group mb-2">
    <input type="text" name="kids" placeholder="Kids" style="height:45px; width:90px;"required>
  </div>
  <div class="form-group mb-2">
    <input type="text" name="stars"placeholder="Stars" style="height:45px; width:90px;">
  </div>
  <button type="submit" class="btn btn-primary mb-2" style="height:45px; width:90px;">Search <i class="fas fa-search"></i></button>


</form>

</div>
</section>

<br>
<br>
<br>
<br>


  <div id="hotels">     </div>



    <script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }



var cities=[]; // global
$.getJSON("getCities.php",function(data){
var city;
    $.each(data,function(key,value){

    str=value.Name;
    str = str.replace(/\s+/g,'');
    cities.push(str);

    });


  });

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("cities"),cities);
    </script>



  </body>
</html>
