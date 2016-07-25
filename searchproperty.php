<?php

session_start();

require_once('configcsc343.php');



if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}

$dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$stmt =$dbh->prepare('SELECT name  FROM user WHERE user.id=:user_id');

$stmt->bindValue(':user_id', $_SESSION['id']);


$res=$stmt->execute();//send query to db






$log=$stmt->fetch(PDO::FETCH_ASSOC);
        




?>


<html>
    
<style>
    
    body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
}
    .button {
  width: 20%;
  padding: 5px;
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
.button1 {
  width: 20%;
  padding: 5px;
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
    
  position:absolute;
   top:40;
   right:0;
}
.button2 {
  width: 20%;
  padding: 5px;
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
    
  position:absolute;
   top:122;
   right:0;
}

.button3 {
  width: 20%;
  padding: 5px;
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
    
  position:absolute;
   top:80;
   right:0;
}
.button:hover {
  opacity: 1;
  cursor: pointer;
}
.button1:hover {
  opacity: 1;
  cursor: pointer;
}
.button2:hover {
  opacity: 1;
  cursor: pointer;
}

.button3:hover {
  opacity: 1;
  cursor: pointer;
}
  </style>




  <div class="adress">
<h1>Welcome <?php echo  $log['name'] ?>!</h1>
<form class="form" method="GET" action="searchpropertycsc343.php">
  
	
        <h2>Please enter zip code of the house that you want to find</h2>
          <input type="text" name="zip" placeholder="zip " />
          <input type="date" name="date_from" placeholder="date_from"  />
        <input type="date" name="date_to" placeholder="date_to"  />
        <input type="money" name="priceform" placeholder="pricefrom"  />
        <input type="money" name="priceto" placeholder="priceto"  />
        <br>
         <button type="submit" class="button" name='type' value='zip'>Search by Zip.</button>
 </form>  
      

      <form class="form" method="GET" action="searchpropertycsc343.php">
        <h3>Search by adress</h3>
        <input type="text" name="address" placeholder="address " />
         <input type="text" name="city" placeholder="city " required="required" />
        <input type="text" name="province" placeholder="province" required="required" />
        <input type="text" name="country" placeholder="country " required="required" />
         <input type="date" name="date_from" placeholder="date_from"  />
        <input type="date" name="date_to" placeholder="date_to"  />
         <input type="money" name="price_from" placeholder="pricefrom"  />
         <input type="money" name="price_to" placeholder="priceto"  />
      
         
        <button type="submit" class="button" name ='type' value="address">Search by Adress.</button>
      </form>
      
      
      
      <form class="form" method="GET" action="searchpropertycsc343.php">
        <h3> Search by lng and lat, please input the range of distance as well. </h3>
        <input type="text" name="longitude" placeholder="longitude "  />
         <input type="text" name="latitude" placeholder="latitude "  />
         <input type="text" name="distance" placeholder="distance "  />
          <input type="date" name="date_from" placeholder="date_from"  />
        <input type="date" name="date_to" placeholder="date_to"  />
       <input type="money" name="price_from" placeholder="pricefrom"  />
         <input type="money" name="price_to" placeholder="priceto"  />
         <br>
         <button type="submit" class="button " name='type' value="coord" >Search by Coordinates.</button>
         
        
         

      </form>
      


      <form class="form" method="POST" action="logout1.php">
   
        <button type="submit" class="button1 name='type' value="logout" >Logout.</button>
         
        
         

      </form>

<form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button2 " name='type' value="logout" >My profile.</button>
         
        
         

      </form>


<form class="form" method="POST" action="main.php">
   
    <button type="submit" class="button3" >Return to Main Page.</button>
         
        
         

      </form>
      
      
      </div>
</html>