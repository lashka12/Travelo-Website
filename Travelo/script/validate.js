

function Main() {

var errors=0;

var name=document.getElementById("firstName").value;
var lastName=document.getElementById("lastName").value;
var birthdDate=document.getElementById("Bdate").value;
var email=document.getElementById("email").value;
var phoneNumber=document.getElementById("phone").value;
var adress=document.getElementById("address").value;
var pass1=document.getElementById("ps1").value;
var pass2=document.getElementById("ps2").value;



if(name==""){
 document.getElementById("userNameErr").innerHTML = "This Field Can't be empty";
 errors++;
}
if(birthdDate==""){
 document.getElementById("birthDateErr").innerHTML = "This Field Can't be empty";
 errors++;
}
if(email==""){
 document.getElementById("emailErr").innerHTML = "This Field Can't be empty";
 errors++;
}
if(phoneNumber==""){
 document.getElementById("phoneErr").innerHTML = "This Field Can't be empty";
 errors++;
}
if(pass1==""){
 document.getElementById("passErr1").innerHTML = "This Field Can't be empty";
 errors++;
}
if(pass2==""){
 document.getElementById("passErr2").innerHTML = "This Field Can't be empty";
 errors++;
}


if(hasNumbers(name)){
 document.getElementById("userNameErr").innerHTML = "[A-Z]*";
 errors++;
}
if(hasNumbers(lastName)){
 document.getElementById("lastNameErr").innerHTML = "[A-Z]*";
 errors++;
}
if(isDateAfterToday(new Date(birthdDate))){
 document.getElementById("birthDateErr").innerHTML = "Date Can not be After Today!";
 errors++;
}

if(email!="")
if(!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
  document.getElementById("emailErr").innerHTML = "Example@somthing.com";
  errors++;
}

if(hasNonStandard(pass1)){

  document.getElementById("passErr1").innerHTML = "passwords must contain only 0-9 , a-z ";
 errors++;

}
if(hasNonStandard(pass2)){

  document.getElementById("passErr2").innerHTML = "passwords must contain only 0-9 , a-z ";
 errors++;

}

if(pass1.localeCompare(pass2)!=0){
  document.getElementById("passErr1").innerHTML = "Password Does not Match";
  document.getElementById("passErr2").innerHTML = "Password Does not Match";
  errors++;
}

if (isNaN(phoneNumber))
{
  document.getElementById("phoneErr").innerHTML = "illegal Number , you can only use digits";
  errors++;
}


if(errors==0){

return true;

}

else return false;



}


function initErr(){

 document.getElementById("userNameErr").innerHTML = "";
 document.getElementById("birthDateErr").innerHTML = "";
 document.getElementById("emailErr").innerHTML = "";
 document.getElementById("phoneErr").innerHTML = "";
 document.getElementById("LastNameErr").innerHTML = "";



}


function hasNumbers(t)
{
var regex = /\d/g;
return regex.test(t);
}

function isDateAfterToday(date) {
   return new Date(date.toDateString()) > new Date(new Date().toDateString());
}

function validateEmail(email) {
 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 return re.test(email);
}


function hasNonStandard(inputElem) {
   return /[^\w]/.test(inputElem);
}


function edit(){

  initErr();
  var errors=0;


  var name=document.getElementById("spUserName").value;
  var lastName=document.getElementById("lastName").value;
  var birthdDate=document.getElementById("Bdate").value;
  var email=document.getElementById("email").value;
  var phoneNumber=document.getElementById("phone").value;

  var address = document.getElementById("adrs").value;



  if(name==""){
   document.getElementById("userNameErr").innerHTML = "This Field Can't be empty";
   errors++;
  }
  if(lastName==""){
   document.getElementById("LastNameErr").innerHTML = "This Field Can't be empty";
   errors++;
  }
  if(birthdDate==""){
   document.getElementById("birthDateErr").innerHTML = "This Field Can't be empty";
   errors++;
  }
  if(email==""){
   document.getElementById("emailErr").innerHTML = "This Field Can't be empty";
   errors++;
  }
  if(phoneNumber==""){
   document.getElementById("phoneErr").innerHTML = "This Field Can't be empty";
   errors++;
  }



  if(hasNumbers(name)){
   document.getElementById("userNameErr").innerHTML = "[A-Z]";
   errors++;
  }
  if(hasNumbers(lastName)){
   document.getElementById("LastNameErr").innerHTML = "[A-Z]";
   errors++;
  }
  if(isDateAfterToday(new Date(birthdDate))){
   document.getElementById("birthDateErr").innerHTML = "Date Can't be After Today";
   errors++;
  }

  if(email!="")
  if(!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
    document.getElementById("emailErr").innerHTML = "Use Format Example@somthing.com";
    errors++;
  }





  if (isNaN(phoneNumber))
  {
    document.getElementById("phoneErr").innerHTML = "illegal Number , you can only use digits";
    errors++;
  }


  if(errors==0){

    document.getElementById("newEmail").value=email;
    document.getElementById("newFirstName").value=name;
    document.getElementById("newLastName").value=lastName;
    document.getElementById("newBirthDate").value=birthdDate;
    document.getElementById("newPhoneNumber").value=phoneNumber;
    document.getElementById("newAddress").value=address;


    $('#exampleModal').modal('show');

  return true;
  }


else{

  return false;
}



}

function openModal(){

document.getElementById('modal-wrapper').style.display='block';

}

function closeSignUp(){

  document.getElementById("userNameErr").innerHTML = "";
  document.getElementById("lastNameErr").innerHTML = "";
  document.getElementById("birthDateErr").innerHTML = "";
  document.getElementById("emailErr").innerHTML = "";
  document.getElementById("phoneErr").innerHTML = "";
  document.getElementById("addressErr").innerHTML = "";
  document.getElementById("passErr1").innerHTML = "";
  document.getElementById("passErr2").innerHTML = "";
  document.getElementById("firstName").value = "";
  document.getElementById("lastName").value = "";
  document.getElementById("Bdate").value = "1995-12-12";
  document.getElementById("email").value = "";
  document.getElementById("phone").value = "";
  document.getElementById("address").value = "";
  document.getElementById("ps1").value = "";
  document.getElementById("ps2").value = "";

var modal=document.getElementById("modal-wrapper");
modal.style.display = "none";
window.location="signOut.php";

}
