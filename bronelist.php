<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}

?>

<html>
    
    <head>
        
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
    </head>
    
    <body>




<?php


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt=$dbh->prepare('SELECT day_in,brone.id ,day_out,street_address,city ,country  FROM brone inner join listing  '
        . 'on brone.listing_id=listing.id inner join location on listing.location_id=location.id where brone.broner_id=:broner_id and brone_status=1');


$stmt->bindValue(":broner_id", $_SESSION['id']);
$stmt->execute();



 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
        <h4> Your move in date: <?php echo $row['day_in']?></h4> 
            
        <h4> Your move out date: <?php echo $row['day_out'] ?></h4>
        <h4> Property address: <?php echo $row['street_address'] ?>  </h4>
         <h4> Destination city is : <?php  echo $row['city'] ?>  </h4>
          <h4> Destination Country is : <?php echo $row['country']  ?>  </h4>



        
        
       <form class="form" method="POST" action="bronelistcsc343.php">
           <input type="hidden" name="brone_id" value='<?php echo $row['id'] ?>' />
   
        <button type="submit" class="button "  >Cancel brone.</button>
</form>
        

    
      <form class="form" method="POST" action="logout1.php">
   
        <button type="submit" class="button1"  >Logout.</button>
         
        
         

      </form>
    
    
        
        <form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button2"  >My profile.</button>
        </form>
        
         

      
    
        <form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button3 "  >Return to mainpage.</button>
         
        
         

      </form>

</body>
</html>
        
      <?php  
      
      
      
      
      
        
    }
              

