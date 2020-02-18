
<?php
session_start();  // start the session


if(!isset($_SESSION['duplicate'])){

$_SESSION['Faildemail']="";
$_SESSION['Faildpassword']="";
$_SESSION['FaildbirthDate']="";
$_SESSION['FaildfirstName']="";
$_SESSION['FaildlastName']="";
$_SESSION['FaildphoneNumber']="";
$_SESSION['Faildaddress']="";


}

if(!isset($_SESSION['try'])){
 $_SESSION['err']='';

}






?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <title> ✈️ Travelo Sign In</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/logInstyle.css">

    <style>
    *{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}


    .modal {
    	display:none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
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
    </style>



    <input type="hidden" id="hiddenDuplicateTag" value="<?= $_SESSION['duplicate']?>" >



  </head>

  <div class="alert alert-error" style="text-align: center;color:red;font-weight: bold;"><?=$_SESSION['err']?></div>

  <body>

<div class="loginBox">

    <div class="login-Header">Sign In</div>
    <br>

<form  method="get" action="getUser.php">

      <div class="form-group ">
        <label for="exampleInputEmail1">Email address</label>
        <input name="UserName" type="text" class="form-control" id="exampleInputEmail1" placeholder="User Name" title="enter your Username" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" title="enter your password" required>
      </div>

      <div class="checkbox">
        <label>
          <input type="checkbox"> Remmember My Password
        </label>

      </div>
<br>


 <button type="submit" class="btn btn-success btn-block">Log In</button>


</form>

<button type="submit" class="btn btn-success btn-block" onclick="document.getElementById('modal-wrapper').style.display='block'" style="margin: 2% auto 7% auto; background-color:#d2902d; border-color:#d2902d;">
Sign Up</button>

  </div>


  <dialog id="modal-wrapper" class="modal">

    <div class="modal-content animate" style="padding: 10px; width:500px;">

     <form action="addUser.php" method="get" onsubmit="return Main()">

         <script src="../script/validate.js"></script>


          <p class="login-Header" id="signUp-Header">Sign Up</p>
          <br>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Full Name </label>
        <label  id='userNameErr' style="color:red;"></label>
        <input name="newUserFirstName" type="text" class="form-control" id="firstName" placeholder="enter your full name" title="enter your Username" value="<?= $_SESSION['FaildfirstName']?>" required>
      </div>

      <div class="form-group col-md-6">
        <label>Last Name </label>
        <label  id='lastNameErr' style="color:red;"></label>
        <input name="newUserLastName" type="text" class="form-control" id="lastName" placeholder="enter your full name" title="enter your Username" value="<?= $_SESSION['FaildlastName']?>" required>
      </div>



    </div>


    <div class="form-row">

      <div class="form-group col-md-6">
        <label>Birth date </label>
        <label  id='birthDateErr' style="color:red;"></label>
        <input name="newUserBirthDate" type="date" class="form-control" id="Bdate" placeholder="Birthdate" value="1995-12-12" title="enter your password"value="<?= $_SESSION['FaildbirthDate']?>" required>
      </div>

      <div class="form-group col-md-6">
        <label>Email</label>
        <label  id='emailErr' style="color:red;"></label>
        <input name="newUserEmail" type="email" class="form-control" id="email" placeholder="enter your email" title="enter your email"value="<?= $_SESSION['Faildemail']?>"  required>
      </div>

</div>


<div class="form-row">

  <div class="form-group col-md-6">
        <label>Phone Number</label>
        <label  id='phoneErr' style="color:red; font-size: 6px;"></label>
        <input name="newUserPhoneNumber" type="text" class="form-control" id="phone" placeholder="enter your phone number" title="enter your phone number" value= "<?= $_SESSION['FaildphoneNumber']?>" required>
      </div>

      <div class="form-group col-md-6">
            <label>Address</label>
            <label  id='addressErr' style="color:red;"></label>
            <input name="newUserAddress" type="text" class="form-control" id="address" placeholder="Address" title="Address" value="<?= $_SESSION['Faildaddress']?>" required>
          </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
        <label>password</label>
        <label  id='passErr1' style="color:red;"></label>
        <input name="newUserPassword1" type="password" class="form-control" id="ps1" placeholder="choose a storng password" title="enter your password"  required>
      </div>

      <div class="form-group col-md-6">
        <label>Confirm Password</label>
        <label  id='passErr2' style="color:red;"></label>
        <input name="newUserPassword2" type="password" class="form-control" id="ps2" placeholder="confirm your Password" title="enter your password" required >
      </div>

    </div>

    <h6  style=" visibility: hidden;">Sign</h6>
    <div class="modal-footer">

      <button type="submit" class="btn btn-primary" >Sign Up</button>
      <button id="button2" type="button" class="btn btn-secondary" onclick="closeSignUp()">Close</button>

      <script>


       if( document.getElementById("hiddenDuplicateTag").value=="yes"){ // it means email is already user

         document.getElementById("emailErr").innerHTML = "Already In Use";
         var modal=document.getElementById("modal-wrapper");
         modal.style.display = "block";

       }


      </script>

    </div>

</form>


    </dialog>



  </div>



  </body>



</html>
