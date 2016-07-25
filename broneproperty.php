

<?php

session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}

$listing_id=filter_input(INPUT_GET,'listing_id',FILTER_UNSAFE_RAW);



$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt=$dbh->prepare('SELECT type,date_from,date_to,price,street_address,city,province,country  from  location inner join listing on listing.location_id=location.id  WHERE listing.id=:listing_id  ');

$stmt->bindValue(':listing_id',$listing_id);
$stmt->execute();
#echo "\nPDO::errorCode(): ", $stmt->errorCode();

$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
<h1>Information about the property </h1>

<body



<h2>The propety is located on the adress:<?php echo $row['street_address'],' ', $row['city'],' ',$row['province'],' ',$row['country'] ?> </h2>


<?php


        
   
    ?>
    
    <p>You have rented a  <?php echo $row['type']?> </p>
     <p>You have indicated that  you want the rent to happen on the below dates</p>
    <p> start date:  <?php echo $row['date_from'] ?>  </p>
    <p> end date:  <?php echo $row['date_to'] ?>  </p>
    <p>Current rent price: $ <?php echo $row['price'] ?> </p>
  
    
  <?php
    
  $stmt=$dbh->prepare('SELECT name  FROM  available_amenities inner join listing_amenities on available_amenities.id=listing_amenities.amenity_id WHERE listing_amenities.listing_id=:listing_id');
  
  
$stmt->bindValue(':listing_id',$listing_id);
$stmt->execute();
?>
    <h4>Below are utilities that house has </h4>
  
<?php
    
  while($row  = $stmt->fetch(PDO::FETCH_ASSOC)){
      
      echo $row['name'] ,' ' ;
      
      
  }
    
    
  ?>
    
    
    <h1>To complete transaction please fill out fields listed below</h1>
  
    <form class="form" method="POST" action="bronepropertcsc343.php">
  
	
        <h2>Please enter  desired start date and end date for the brone</h2>
          <input type="date" name="date_from"  placeholder="date_from " required="required"/>
          <input type="date" name="date_to" placeholder="date_to" required="required" />
        
          <input type="hidden" name="listing_id" value='<?php echo $listing_id ?>' /><br>
          <h2>Please note, you  brone will be complete only, after putting your card information for payment </h2>
          <input type='text' name='cardholder_name'  placeholder="Name on your Card" required="required" /> <br>
              <input type='text' name='card_number'  placeholder="Cardnumber" required="required"  /><br>
          <input type='text' name='cvc_number'  placeholder="Cvc Number" required="required" /><br>
          <select name="card_type" required="required">
              
        <option>
            visa
    </option>
    <option>
            mastercard
    </option>     
    <option>
            maestro
    </option>
    <option>
            americanexpress
    </option>
     
</select>
    <br>  
   

        
         <button type="submit" class="button">Brone property.</button>
 </form>
        
        
        
        
        



      <form class="form" method="POST" action="logout1.php">
   
        <button type="submit" class="button1 " >Logout.</button>
         
        
         

      </form>

<form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button2"  >My profile.</button>
         
        
         

      </form>
    <form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button3"  >Return to Main Page.</button>
         
        
         

      </form>
    
    </body>

</html>
