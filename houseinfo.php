<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}

$location_id=filter_input(INPUT_GET,'location_id',FILTER_UNSAFE_RAW);


if(empty($location_id)){
    
   # header('Location: csc343.php');
    echo 'You have not rented out this property yet :(';
	#die();
        
    
}

$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt=$dbh->prepare('SELECT street_address,city,province,country  from  location  WHERE location.id=:location_id  ');

$stmt->bindValue(':location_id',$location_id);
$stmt->execute();


$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<html
    <head>
       
    </head>
    <body> 
    <h1>Here is the information about current house. You have rented a house currently situated on the adress</h1>
     
    
    <h2><?php echo $row['street_address'],' ', $row['city'],' ',$row['province'],' ',$row['country'] ?> </h2>
    



<?php


$stmt=$dbh->prepare('SELECT id,type,date_from,date_to,price,active_list from listing WHERE listing.location_id=:location_id');
$stmt->bindValue(':location_id', $location_id);
$stmt->execute();
     


if(empty($row=$stmt->fetch(PDO::FETCH_ASSOC))){
    
   ?>
    
    <h3>Our records indicate that you have put this house for rent, but have not rented out it  , please return to previous page and click rent out button</h3>
    
    
    
    
    <?php
    
    
    
    
    
}

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
   
    
    if($row['active_list']==1){
    
    ?>
    <p>You have rented a  <?php echo $row['type']?> </p>
     <p>You have indicated that  you want the rent to happen on the below dates</p>
    <p> start date:  <?php echo $row['date_from'] ?>  </p>
    <p> end date:  <?php echo $row['date_to'] ?>  </p>
    <p>Current rent price: $ <?php echo $row['price'] ?> </p>
    <h4> Click link below , if you want to check whether your house has been broned or not </h4>
    <a href="listinginfo.php?listing_id=<?php echo $row['id']?>">Brone Information of this house</a> <br>
    <br>
    
    
    
    <form class="form" method="post" action="changeprice.php">
        <input type="money" name="cost"> <br>
        <input type='hidden' name='location_id' value='<?php echo $location_id ?>' />
         <input type='hidden' name='listing_id' value='<?php echo $row['id'] ?>' />
        <button type="submit" class="button4" name='change' value='0'>Change rent price </button>
    </form> 
    
    
    
    <h3> Below you can cancel your rent.</h3>
    <h4>Please be awarned you can cancel your rent only if your property has not been broned yet</h4>
    <form class="form" method="post" action="houseinfocsc343.php">
        <input type='hidden' name='location_id' value='<?php echo $location_id ?>' />
         <input type='hidden' name='listing_id' value='<?php echo $row['id'] ?>' />
        <button type="submit" class="button" name='cancel' value='0'>Cancel the rent of property </button>
    </form> 
    <?php
    }
}
?>  
   
    <style>
        
 body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
}       
 .button4 {
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
.button4:hover {
  opacity: 1;
  cursor: pointer;
}
    </style>
    
      <form class="form" method="POST" action="logout1.php">
        

        <button type="submit" class="button1 " name='type' value="logout" >Logout.</button>
         
        
         

      </form>
    <form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button2" name='type' value="logout" >My profile.</button>
        
        
        
      </form>
    
    <form class="form" method="POST" action="listhouses.php">
   
        <button type="submit" class="button3 "  >Return  back to my rent listing.</button>
         
        
         

        
         

      </form>
     </body>  
</html>