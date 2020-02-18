<?php


session_start();

if(!isset($_SESSION['email'])){

  header("location:index.php");

}

if(isset($_SESSION['addedCarReview'])){
  unset($_SESSION['addedCarReview']);
}

if(isset($_SESSION['addedCarComment'])){
  unset($_SESSION['addedCarComment']);

}


if(isset($_GET['fromCity'])){
$_SESSION['searchCarFromCity']=$_GET['fromCity'];
$_SESSION['searchCarFromDate']=$_GET['fromDate'];
$_SESSION['searchCarToDate']=$_GET['toDate'];
$_SESSION['age']=$_GET['age'];


}


else{

if(!isset($_SESSION['carAdded'])){
  $_SESSION['searchCarFromCity']="";
  $_SESSION['searchCarFromDate']="2019-02-01";
  $_SESSION['searchCarToDate']="2019-02-05";
  $_SESSION['age']="";
}


}


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/cars.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Cars</title>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>


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

    .input-container {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }

    .icon {
      padding: 10px;
      background: dodgerblue;
      color: white;
      min-width: 50px;
      text-align: center;
    }

    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
    }

    .input-field:focus {
      border: 2px solid dodgerblue;
    }

    /* Set a style for the submit button */
    .btn {
      background-color: dodgerblue;
      color: white;
      padding: 15px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }
    </style>






    <input type="hidden" id="hiddenAge" value="<?= $_SESSION['age']?>" >
    <input type="hidden" id="hiddenFromDate" value="<?= $_SESSION['searchCarFromDate']?>" >
    <input type="hidden" id="hiddenToDate" value="<?= $_SESSION['searchCarToDate']?>" >



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
    <li><a href="Cars.php"id="main-tab"><i class="fas fa-car"></i> Cars Rental</a></li>
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
    <h2 style="text-align:center;color:white;font-weight:bold;">Find It Cheaper And We'll Beat It !</h2>
    </div>
    </section>


    <section class="section ">

      <div class="container"style="vertical-align: middle;text-align:center;">

    <form  class="form-inline" style="vertical-align: middle;" autocomplete="off" action="../System/cars.php" method="get">

      <br>
      <br>
      <div class="autocomplete" style="width:200px;">

         <div class="form-group mb-2">
            <input id="countries" type="text" name="fromCity" placeholder="Pick up City" style="height:45px; width:200px;"required value="<?= $_SESSION['searchCarFromCity']?>">
        </div>
      </div>


      <div class="form-group mx-sm-3 mb-2">
        <input type="date"  name="fromDate"placeholder="Check-in"style="height:45px; width:175px;"value="<?= $_SESSION['searchCarFromDate']?>">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="date" id="toDate"name="toDate"placeholder="Check-out"style="height:45px ;width:175px;"value="<?= $_SESSION['searchCarToDate']?>" style="display: none">
      </div>
      <div class="form-group mb-2">
         <input  type="text" name="age" placeholder="Age" style="height:45px; width:60px;"required value="<?= $_SESSION['age']?>">
     </div>
      <button type="submit" class="btn btn-primary mb-2" style="height:45px; width:90px;"><i class="fas fa-search"></i></button>
    </form>
    <br>


    </div>
    </section>




    <div id="cars"><br><br><br>


    </diV>


      <script>

      var cars='';
      $.getJSON("getCars.php",function(data){
          $.each(data,function(key,value){
         var aut='';
         if(value.automatic+""=="yes"||value.automatic+""==" yes"||value.automatic+""==" yes "||value.automatic+""=="Yes"||value.automatic+""=="yes "){
         aut="Automatic";

         }
         else{
           aut="Gear";

         }


     var price;

      if(document.getElementById("hiddenAge").value!=""){
         var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
         var firstDate = new Date(document.getElementById("hiddenFromDate").value);
         var secondDate = new Date(document.getElementById("hiddenToDate").value);
         var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));

         if(parseInt(document.getElementById("hiddenAge").value)>23){
         price=(parseInt(diffDays)*parseInt(value.basePrice))+" $";
         }
         else{
         price=(parseInt(diffDays)*parseInt(value.adultPrice))+" $";

         }

  }

  else{

   price=value.basePrice+" $ Per Day";


  }

var dis="";

if(value.taken=="yes"){
dis="disabled";

}

var hidden="";
if(value.hidden=="yes"){
hidden="display: none;";

}



    cars+= '<div class="container">'
           +'<div class="row"style="background: rgba(0,0,0, 0.5)">'
           +'<table style="font-size:14px;">'
           +'<tr>'
           +'<td>'
           +'<img src="../carsPictures/'+value.picFileName+'"style="width:180px;height:180px;padding: 10px;">'
           +'</td>'
           +'<td style="padding-left:30px;">'

           +'<h2 class="inline"style="font-weight: bold;color:#ffa31a;">'+value.car+'</h2>'
           +'<h2 class="inline"style="color:green; font-weight:bold;">'+price+'</h2>'
           +'<br><br>'
           +'<p style="padding-right:80px;">'+value.discription+'</p>'
           +'<p style="padding-right:80px;color:#ffa31a;"><i class="fas fa-cogs"></i> '+aut+' '+value.seats+'  Seats'+'</p>'
           +'<p style="padding-right:80px;color:#ffa31a;"><i class="fas fa-map-marker"></i> '+ value.pickUpCity+''+ value.phone+'</p>'
           +'</td>'
           +'<td style="padding-left:5px;padding-right:30px;">'
           +'<form method="get" action="addCarToShoppingCart.php">'
           +'<input type="hidden" name="serial" value="'+value.serial+'">'
           +'<button '+dis+' type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px; '+hidden+'"><i class="fas fa-cart-arrow-down"></i> Add to Watch List</button>'
           +'</form>'
           +'<br><br>'
           +'<form id="" action="carReviews.php" class="" method="get">'
           +'<input type="hidden" name="carIdForReviews" value="'+value.serial+'">'
           +'<button type="submit" class="btn btn-primary mb-2" style="height:45px; width:180px;">show Comments</button>'
           +'</form>'
           +'</td>'
           +'</tr>'
           +'</table>'
           +'</div>'
           +'</div>'
           +'<br>';



          });

          $('#cars').append(cars);

        });

      </script>










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
    autocomplete(document.getElementById("countries"),cities);

    </script>



  </body>
</html>
