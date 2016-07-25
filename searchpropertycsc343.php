
<?php

session_start();
require_once ('configcsc343.php');

if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}

 $dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$search_type=filter_input(INPUT_GET,'type',FILTER_UNSAFE_RAW);

$pricefrom=  filter_input(INPUT_GET, 'pricefrom',FILTER_VALIDATE_INT,array("options" => array(
    "default" => 0
)));
$priceto=  filter_input(INPUT_GET, 'priceto',FILTER_VALIDATE_INT,array("options" => array(
    "default" => 1000000000
   
)));


$datefrom=  filter_input(INPUT_GET, 'datefrom',FILTER_UNSAFE_RAW,array("options" => array(
    "default" => '2999-12-31'
    
)));
$dateto=  filter_input(INPUT_GET, 'dateto',FILTER_UNSAFE_RAW,array("options" => array(
   "default" => '0001-01-01'
   
)));

?>


<html>
    
    <head>
        
        
          <style>
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


ol {
    display: block;
    color:red;
    list-style-type: decimal;
    font-size: 20px;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
   
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

.button:hover {
  opacity: 1;
  cursor: pointer;
}

.optimize {
  position: fixed;
  right: 3%;
  top: 0px;
}

</style>

    </head>
    
            
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="wrapper">
        
        
        
        





<?php
if($search_type==='zip'){
    
   $zip= filter_input(INPUT_GET, 'zip',FILTER_UNSAFE_RAW);
   
   
   $stmt=$dbh->prepare('SELECT listing.id,listing.price,listing.date_from,listing.date_to,street_address,zip_code,city,province,country,longitude,latitude  from location INNER JOIN listing on location.id=listing.location_id '
           . ' WHERE  date_from<=:date_from and date_to>=:date_to and price BETWEEN :price_from and :price_to and location.zip_code=:zip_code');
   
   
  $stmt->bindValue(':price_from', $pricefrom);
  $stmt->bindValue(':price_to', $priceto);
  $stmt->bindValue(':date_from', $datefrom,PDO::PARAM_STR);
  $stmt->bindValue(':date_to', $dateto,PDO::PARAM_STR);      
   $stmt->bindValue(':zip_code', $zip);

   
   
   
   
   
   
   
   
}
elseif($search_type==='address' ){
    
   $address= filter_input(INPUT_GET, 'address',FILTER_UNSAFE_RAW);
   $city= filter_input(INPUT_GET, 'city',FILTER_UNSAFE_RAW);
   $province= filter_input(INPUT_GET, 'province',FILTER_UNSAFE_RAW);
   $country= filter_input(INPUT_GET, 'country',FILTER_UNSAFE_RAW);
   
   
   $stmt=$dbh->prepare('SELECT listing.id,listing.price,listing.date_from,listing.date_to,street_address,zip_code,city,province,country,longitude,latitude  from location INNER JOIN listing on location.id=listing.location_id '
           . ' WHERE  date_from<=:date_from and date_to >=:date_to and price BETWEEN :price_from and :price_to and location.street_address=:address and location.city=:city and location.province=:province and location.country=:country');
   
   
  $stmt->bindValue(':address', $address);
  $stmt->bindValue(':city', $city);
  $stmt->bindValue(':province', $province);
  $stmt->bindValue(':country', $country);      
   
   
   
  $stmt->bindValue(':price_from', $pricefrom);
  $stmt->bindValue(':price_to', $priceto);
  $stmt->bindValue(':date_from', $datefrom,PDO::PARAM_STR);
  $stmt->bindValue(':date_to', $dateto,PDO::PARAM_STR);      
 

}

elseif($search_type==='coord' ){
    
   //citay lat and long and stuff 
    
   $longitude= filter_input(INPUT_GET, 'longitude',FILTER_UNSAFE_RAW);
   $latitude= filter_input(INPUT_GET, 'latitude',FILTER_UNSAFE_RAW);
   $distance= filter_input(INPUT_GET, 'distance',FILTER_UNSAFE_RAW);
   
   //where lat f
   $stmt=$dbh->prepare('SELECT listing.id,listing.price,listing.date_from,listing.date_to,street_address,zip_code,city,province,country,longitude,latitude  from location INNER JOIN listing on location.id=listing.location_id '
           . ' WHERE  date_from<=:date_from and date_to >=:date_to and price BETWEEN :price_from and :price_to and  longitude BETWEEN :long_from  and :long_to and latitude BETWEEN :lat_from and :lat_to');
   
   
   
   //k long from podklucay longtide-distance
   //kk long to budet long plus distance
   // same thing with lat-dis
   //long+dis
   
   
   
   
 $radius = 6371;
 
$lat_from=$latitude-rad2deg($distance / $radius);
$lat_to=$latitude+rad2deg($distance / $radius);

  
$long_from=$longitude-rad2deg($distance / $radius / cos(deg2rad($latitude)));
$long_to=$longitude+rad2deg($distance / $radius / cos(deg2rad($latitude)));







  $stmt->bindValue(':long_from', $long_from);
  $stmt->bindValue(':long_to', $long_to);
  $stmt->bindValue(':lat_from', $lat_from);
  $stmt->bindValue(':lat_to', $lat_to);      
   
   
   
  $stmt->bindValue(':price_from', $pricefrom);
  $stmt->bindValue(':price_to', $priceto);
  $stmt->bindValue(':date_from', $datefrom,PDO::PARAM_STR);
  $stmt->bindValue(':date_to', $dateto,PDO::PARAM_STR);      
 

}





$stmt->execute();
?>
    
    <body>

      <h1>Your properties:</h1>
        <ol>   
        
        
        
<?php




if (empty($row=$stmt->fetch(PDO::FETCH_ASSOC))){
   
    ?>
    
            <h4>Unforunately we could not find you required property. The property either does not exist or has been removed by from rent list by owner</h4> 
            
            
            
            <?php
    
    
    
    
}

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    
    
 ?>

    
            <li>Address of the Property: <?php echo $row['street_address'],' ',$row['zip_code'],' ',$row['city'],' ',$row['province'],' ',$row['country'],' ',$row['longitude'],' ',$row['latitude']; ?>  
        
        
                <form action='broneproperty.php' method='get'>
         <input type='hidden' name='listing_id' value='<?php echo $row['id']; ?>' />
         <button type='submit' class="button">Brone this house</button>
        </form>
            
             
            
        
        </li>
            
        
            <?php
            
        }
       
        

 ?>       
        
        
        
    </ol>
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </body>
    
</html>
