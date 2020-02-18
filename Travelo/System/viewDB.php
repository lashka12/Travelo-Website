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
    <link rel="stylesheet" href="../styles/flights.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>DataBase View</title>
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
      <li id="viewDB"><a href="viewDB.php"id="main-tab"><i class="fas fa-database"></i> DataBase View</a></li>
      </div></li>
    </ul>
    </div>


     <br>
     <br>
     <br>
     <br>
     <br>
     <br>



<br>
<div class=""style="text-align: center;">
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#carsModal" >View DataBase Cars</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#flightsModal">View DataBase Flights</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#hotelsModal">View DataBase Hotels</button>
</div>
<br>
<div class=""style="text-align: center;">
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#uploadCarsModal">Upload Cars</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#uploadHotelsModal">Upload Hotels</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" style="width:200px;height:100px;" data-target="#uploadFlightsModal">Upload flights</button>
</div>


<div class="modal fade" id="uploadFlightsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Flights</h5>
        </button>
      </div>
      <div class="modal-body">
        <form  id="uploadFlightsForm"action="uploadFlights.php">
          <p>Choose file:</p>
          <div class="custom-file mb-3">
            <input type="file" name="filename"  class="inputfile" />
            <label for="file">Choose a file</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="uploadFlightsForm"><i class="fas fa-upload"></i></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="uploadHotelsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Hotels</h5>
        </button>
      </div>
      <div class="modal-body">
        <form  id="uploadHotelsForm"action="uploadHotels.php">
          <p>Choose file:</p>
          <div class="custom-file mb-3">
            <input type="file" name="filename"  class="inputfile" />
            <label for="file">Choose a file</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="uploadHotelsForm"><i class="fas fa-upload"></i></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="uploadCarsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Cars</h5>
        </button>
      </div>
      <div class="modal-body">
        <form  id="uploadCarsForm"action="uploadCars.php">
          <p>Choose file:</p>
          <div class="custom-file mb-3">
            <input type="file" name="filename" class="inputfile" />
            <label for="file">Choose a file</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="uploadCarsForm"><i class="fas fa-upload"></i></button>
      </div>
    </div>
  </div>
</div>



    <div class="modal fade" id="carsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"style="width:1200px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Serial</th>
                  <th scope="col">Car</th>
                  <th scope="col">Company</th>
                  <th scope="col">Pick Up City</th>
                  <th scope="col">Seats</th>
                  <th scope="col">Automatic</th>
                  <th scope="col">Base Price</th>
                  <th scope="col">Adults Price</th>
                </tr>
              </thead>
              <tbody id="cars">
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="flightsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"style="width:1200px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">Airline</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Departure 1</th>
                  <th scope="col">Arrival 1</th>
                  <th scope="col">Departure 2</th>
                  <th scope="col">Arrival 2</th>
                  <th scope="col">One Way</th>
                  <th scope="col">Direct</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody id="flights">
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="hotelsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"style="width:1200px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">City</th>
                  <th scope="col">Stars</th>
                  <th scope="col">Adult Per Day</th>
                  <th scope="col">Child Per Day</th>
                </tr>
              </thead>
              <tbody id="hotels">
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>


    <script>

    var hotels='';
    $.getJSON("getDBHotels.php",function(data){
        $.each(data,function(key,value){
           hotels+='<tr>';
           hotels+='<th scope="row">';
           hotels+='</th>';
           hotels+='<td>'+value.id+'</td>';
           hotels+='<td>'+value.name+'</td>';
           hotels+='<td>'+value.city+'</td>';
           hotels+='<td>'+value.stars+'</td>';
           hotels+='<td>'+value.adultPricePerDay+'</td>';
           hotels+='<td>'+value.childPricePerDay+'</td>';

           hotels+='</tr>';
         });
         $('#hotels').append(hotels);
      });

    var flights='';
    $.getJSON("getDBFlights.php",function(data){
        $.each(data,function(key,value){
           flights+='<tr>';
           flights+='<th scope="row">';
           flights+='</th>';
           flights+='<td>'+value.number+'</td>';
           flights+='<td>'+value.airLine+'</td>';
           flights+='<td>'+value.fromCity+'</td>';
           flights+='<td>'+value.toCity+'</td>';
           flights+='<td>'+value.departure1+'</td>';
           flights+='<td>'+value.arrival1+'</td>';
           flights+='<td>'+value.departure2+'</td>';
           flights+='<td>'+value.arrival2+'</td>';
           flights+='<td>'+value.oneWay+'</td>';
           flights+='<td>'+value.direct+'</td>';
           flights+='<td>'+value.price+'</td>';
           flights+='</tr>';
         });
         $('#flights').append(flights);
      });



    var cars='';
    $.getJSON("getDBCars.php",function(data){
        $.each(data,function(key,value){
           cars+='<tr>';
           cars+='<th scope="row">';
           cars+='</th>';
           cars+='<td>'+value.serial+'</td>';
           cars+='<td>'+value.car+'</td>';
           cars+='<td>'+value.company+'</td>';
           cars+='<td>'+value.pickUpCity+'</td>';
           cars+='<td>'+value.seats+'</td>';
           cars+='<td>'+value.automatic+'</td>';
           cars+='<td>'+value.basePrice+'</td>';
           cars+='<td>'+value.adultPrice+'</td>';
           cars+='</tr>';
         });
         $('#cars').append(cars);
      });
    </script>


  </body>
</html>
