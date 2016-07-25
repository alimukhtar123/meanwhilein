<?php
session_start();
?>





<html>
    
    <head>
        <style>

/*dark background to support form theme*/
body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
}

/*sass variables used*/
/*site container*/
.wrapper {
  width: 420px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  padding: 30px 0px 0px 0px;
  font: 25px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  margin: 0px;
}

p {
  font: 13px Open Sans;
  color: #6E6E6E;
  text-shadow: #000 0px 1px 5px;
  margin-bottom: 30px;
}

.form {
  width: 100%;
}

input[type="text"], input[type="email"] {
  width: 98%;
  padding: 15px 0px 15px 8px;
  border-radius: 5px;
  box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.3), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
  background: rgba(0, 0, 0, 0.2);
  outline: none;
  border: none;
  border: 1px solid black;
  margin-bottom: 10px;
  color: #6E6E6E;
  text-shadow: #000 0px 1px 5px;
}

input[type="submit"] {
  width: 100%;
  padding: 15px;
  border-radius: 5px;
  outline: none;
  border: none;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F));
  background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: linear-gradient(#28D2DE 0%, #1A878F 100%);
  font: 14px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  border: 1px solid #000;
  opacity: 0.7;
  -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  border-top: 1px solid rgba(255, 255, 255, 0.8) !important;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255, 255, 255, 0.2)));
}

input:focus {
  box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.7), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
  background: rgba(0, 0, 0, 0.3);
  -webkit-transition: 1s ease;
  -moz-transition: 1s ease;
  -o-transition: 1s ease;
  -ms-transition: 1s ease;
  transition: 1s ease;
}

input[type="submit"]:hover {
  opacity: 1;
  cursor: pointer;
}

.name-help, .email-help,.login-help {
  display: none;
  padding: 0px;
  margin: 0px 0px 15px 0px;
}

.optimize {
  position: fixed;
  right: 3%;
  top: 0px;
}

</style>
<script type="text/javascript" src="jquery.js"></script>

<script type='text/javascript'>
    
    $(".name").focus(function(){
  $(".name-help").slideDown(500);
}).blur(function(){
  $(".name-help").slideUp(500);
});

$(".email").focus(function(){
  $(".email-help").slideDown(500);
}).blur(function(){
  $(".email-help").slideUp(500);
});

</script>
    </head>
    
    
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="wrapper">
  <h1>Register For An Account</h1>
  <p>To sign-up for a free basic account please provide us with some basic information using
  the contact form below. Please use valid credentials.</p> 
  <?php
	
  
	if (isset ($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];  //displays all erorr from newuser	
	unset($_SESSION['ERROR']);// deletes error after displaying it
}
	?>
  
  <form class="form" method="post" action="registrationcsc343.php">
    <input type="text" class="name" placeholder="Login"  name="login">
    <input type="password" class="name" placeholder="Password" name="password1" >
    <input type="password" class="name" placeholder="Password" name="password2">
    <input type="text" class="name" placeholder="Name" name="name">
    <input type="text" class="name" placeholder="Lastname" name="lastname"  >
    <input type="text" class="name" placeholder="Street Adress" name="streetadress">
    <input type="text" class="name" placeholder="ZIP" name="zipadress">
     <input type="text" class="name" placeholder="City"  name="city">
      <input type="text" class="name" placeholder="Province" name="province">
       <input type="text" class="name" placeholder="Country" name="country">
        <input type="text" class="name" placeholder="Longitude" name="longitude">
         <input type="text" class="name" placeholder="Latitude" name="latitude">
    <input type="text" class="name" placeholder="Social Insurance Number" name="sin">
    <input type="text" class="name" placeholder="Date of Birth(Year/Day/Month)" name="birthdaydate">
    <input type="text" class="name" placeholder="Occupation" name="occupation">
    
    <div>
      <p class="login-help">Please enter your nickname.</p>
    </div>
    
    <div>
      <p class="name-help">Please enter your first and last name.</p>
    </div>
    <input type="email" class="email" placeholder="Email" name="email">
     <div>
         
      <p class="email-help">Please enter your current email address.</p>
    </div>
    <p><input type="checkbox" required > I hereby confirm that my legal age is 18 or above</p>
    <input type="submit" class="submit" value="Register">
  </form>
</div>
<p class="optimize">
  Optimized for Chrome & Firefox!
</p>




</html>





