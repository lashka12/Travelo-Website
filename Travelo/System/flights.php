
<?php

session_start();
if(!isset($_SESSION['email'])){

  header("location:index.php");

}



if(isset($_GET['fromCity'])){
$_SESSION['searchFlightFromCity']=$_GET['fromCity'];
$_SESSION['searchFlightFromDate']=$_GET['fromDate'];
$_SESSION['seacrhFlightToCity']=$_GET['toCity'];
$_SESSION['searchFlightToDate']=$_GET['toDate'];


}


else{

  $_SESSION['searchFlightFromCity']="";
  $_SESSION['searchFlightFromDate']="2019-02-01";
  $_SESSION['seacrhFlightToCity']="";
  $_SESSION['searchFlightToDate']="2019-02-05";


}


if(isset($_GET['direct'])){
  $_SESSION['direct']="yes";
}
else{
  $_SESSION['direct']="no";

}

if(isset($_GET['oneWay'])){
  $_SESSION['oneWay']="yes";

}
else{
  $_SESSION['oneWay']="no";

}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/flights.css">
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

    <title>Flights</title>
  </head>
  <body>

   <style>
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
    <li><a href="travel.php"><i class="fas fa-plane"></i> Travel Now</a></li>
    <li><a href="hotels.php"><i class="fas fa-hotel"></i> Hotels</a></li>
    <li><a href="flights.php"id="main-tab"><i class="fas fa-plane-departure"></i> Flights</a></li>
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
    <br>

    <section class="section section-free"style="z-index:-1;">
    <div class="container">
    <h2 style="text-align:center;color:white;font-weight:bold;">Find The Best Flights Deals With Travelo</h2>
    </div>
    </section>
    <br>


    <section class="section ">

      <div class="container"style="vertical-align: middle;text-align:center;">

    <form  class="form-inline" style="vertical-align: middle;" autocomplete="off" action="../System/flights.php" method="get">
      <label class="checkbox-inline"style="color:white;">
        <input type="checkbox" id="direct" name="direct" <?php echo isset($_GET['direct']) ? "checked" : ""; ?>/>Direct Flight
      </label>
      <label class="checkbox-inline"style="color:white;">
        <input type="checkbox" id="oneWay"name="oneWay"<?php echo isset($_GET['oneWay']) ? "checked" : ""; ?>/>One Way Ticket
      </label>
      <br>
      <br>
      <div class="autocomplete" style="width:200px;">
         <div class="form-group mb-2">
            <input id="countries" type="text" name="fromCity" placeholder="From" style="height:45px; width:200px;"required value="<?= $_SESSION['searchFlightFromCity']?>">
        </div>
      </div>

      <div class="autocomplete" style="width:200px;">
         <div class="form-group mb-2">
            <input id="countries2" type="text" name="toCity" placeholder="To" style="height:45px; width:200px;"required value="<?= $_SESSION['seacrhFlightToCity']?>">
        </div>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="date"  name="fromDate"placeholder="Check-in"style="height:45px; width:170px;"value="<?= $_SESSION['searchFlightFromDate']?>">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="date" id="toDate"name="toDate"placeholder="Check-out"style="height:45px ;width:170px;"value="<?= $_SESSION['searchFlightToDate']?>" style="display: none">
      </div>

      <button type="submit" class="btn btn-primary mb-2" style="height:45px; width:90px;">Search <i class="fas fa-search"></i></button>


    </form>

    </div>
    </section>



<br>
<br>
<br>
<br>



    <div id="flights">




</div>

    <script>

    var flights='';
    $.getJSON("getFlights.php",function(data){

        $.each(data,function(key,value){

          var dis="";

          if(value.taken=="yes"){
          dis="disabled";

          }

          var hidden="";
          if(value.hidden=="yes"){
          hidden="display: none;";

          }


        if(value.oneWay=="yes"){

         flights+='<div class="container">'
             +'<div class="row"><div class="col-sm-2"style="padding:3px;"><img src="../airLinesPictures/'+value.picFileName+'"style="width:150px;height:150px;padding:10px;"></div>'
             +'<div class="col-sm-2"style="padding-top:7px;padding-left:100px;"><h2 style="font-weight:bold;">'+value.fromCity+'</h2>'
             +'<p style="font-size:13px;">'+value.departure1+'</p>'
             +'<p style="font-size:13px;">'+value.departureTime1+'</p>'
             +'<p style="font-size:13px;">'+value.departureAirport+'</p>'
             +'</div>'
             +'<div class="col-sm-2">'
             +'<i class="fas fa-arrow-right" style="padding-top:70px;padding-left:100px;"></i>'
             +'</div>'
             +'<div class="col-sm-2"style="padding-top:7px;padding-left:50px;">'
             +'<h2 style="font-weight:bold;">'+value.toCity+'</h2>'
             +'<p style="font-size:13px;">'+value.arrival1+'</p>'
             +'<p style="font-size:13px;">'+value.arrivalTime1+'</p>'
             +'<p style="font-size:13px;">'+value.arrivalAirport+'</p>'
             +'</div>'
             +'<div class="col-sm-2"style="padding-top:30px;padding-left:190px;">'
             +'<h2 style="font-weight:bold;align:center;color:green;align:right;">'+value.price+'$</h2>'
             +'<form method="get" action="addFlightToShoppingCart.php">'
             +'<input type="hidden" name="number" value="'+value.number+'">'
             +'<button '+dis+' type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px; '+hidden+'"><i class="fas fa-cart-arrow-down"></i> Add to Watch List</button>'
             +'</form>'
             +'</div>'
             +'</div></div><br>';

           }




                else{
                  flights+='<div class="container">'
                      +'<div class="row"style="background: rgba(0,0,0, 0.5)"><div class="col-sm-2"style="padding:3px;"><img src="../airLinesPictures/'+value.picFileName+'"style="width:150px;height:150px;padding:10px;"></div>'
                      +'<div class="col-sm-2"style="padding-top:7px;padding-left:100px;"><h2 style="font-weight:bold;">'+value.fromCity+'</h2>'
                      +'<p style="font-size:13px;">'+value.departure1+'</p>'
                      +'<p style="font-size:13px;">'+value.departureTime1+'</p>'
                      +'<p style="font-size:13px;">'+value.departureAirport+'</p>'
                      +'</div>'
                      +'<div class="col-sm-2">'
                      +'<i class="fas fa-arrow-right" style="padding-top:70px;padding-left:100px;"></i>'
                      +'</div>'
                      +'<div class="col-sm-2"style="padding-top:7px;padding-left:50px;">'
                      +'<h2 style="font-weight:bold;">'+value.toCity+'</h2>'
                      +'<p style="font-size:13px;">'+value.arrival1+'</p>'
                      +'<p style="font-size:13px;">'+value.arrivalTime1+'</p>'
                      +'<p style="font-size:13px;">'+value.arrivalAirport+'</p>'
                      +'</div>'
                      +'<div class="col-sm-2"style="padding-top:30px;padding-left:190px;">'
                      +'</div>'
                      +'</div>'
                      +'<div class="row"style="background: rgba(0,0,0, 0.5)"><div class="col-sm-2"style="padding:3px;"><img src="../airLinesPictures/'+value.picFileName+'"style="width:150px;height:150px;padding:10px;"></div>'
                      +'<div class="col-sm-2"style="padding-top:7px;padding-left:100px;"><h2 style="font-weight:bold;">'+value.toCity+'</h2>'
                      +'<p style="font-size:13px;">'+value.departure2+'</p>'
                      +'<p style="font-size:13px;">'+value.departureTime2+'</p>'
                      +'<p style="font-size:13px;">'+value.arrivalAirport+'</p>'
                      +'</div>'
                      +'<div class="col-sm-2">'
                      +'<i class="fas fa-arrow-right" style="padding-top:70px;padding-left:100px;"></i>'
                      +'</div>'
                      +'<div class="col-sm-2"style="padding-top:7px;padding-left:50px;">'
                      +'<h2 style="font-weight:bold;">'+value.fromCity+'</h2>'
                      +'<p style="font-size:13px;">'+value.arrival2+'</p>'
                      +'<p style="font-size:13px;">'+value.arrivalTime2+'</p>'
                      +'<p style="font-size:13px;">'+value.departureAirport+'</p>'
                      +'</div>'
                      +'<div class="col-sm-2"style="padding-top:30px;padding-left:190px;">'
                      +'<h2 style="font-weight:bold;align:center;color:green;align:right;">'+value.price+'$</h2>'
                      +'<form method="get" action="addFlightToShoppingCart.php">'
                      +'<input type="hidden" name="number" value="'+value.number+'">'
                      +'<button '+dis+' type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px; '+hidden+'"><i class="fas fa-cart-arrow-down"></i> Add to Watch List</button>'
                      +'</form>'
                      +'</div>'
                      +'</div>'
                      +'</div>'
                      +'<br>';


                }




        });

        $('#flights').append(flights);

      });

    </script>




















    <script>




    if ($("#oneWay").is(":checked")) {
        $("#toDate").hide();
    } else {
        $("#toDate").show();
    }
    $(function () {
            $("#oneWay").click(function () {
                if ($(this).is(":checked")) {
                    $("#toDate").hide();
                } else {
                    $("#toDate").show();
                }
            });
        });








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
    autocomplete(document.getElementById("countries"),cities);
    autocomplete(document.getElementById("countries2"),cities);

    </script>








  </body>
</html>
