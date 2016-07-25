<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$button_type=filter_input(INPUT_GET,'button',FILTER_UNSAFE_RAW);


if($button_type=='country'){
    
    $stmt=$dbh->prepare('SELECT country, COUNT(listing.id) AS listing_count FROM location  inner join listing on listing.location_id=location.id GROUP by location.country');
    
$stmt->execute();
    
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['country'],' :',$row['listing_count']; ?>  </p> 


        
        
      <?php  
        
    }
}
else if ($button_type =='countrycity') {
    
        $stmt=$dbh->prepare('SELECT country,city,COUNT(listing.id) AS listing_count FROM location  inner join listing on listing.location_id=location.id GROUP by location.country,location.city');
        $stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['country'],' :',$row['city'],' :',$row['listing_count']; ?>  </p> 


        
        
      <?php  
        
    }
    
    
}   

else if ($button_type =='countrycityzip') {
    
        $stmt=$dbh->prepare('SELECT country,city,zip_code, COUNT(listing.id) AS listing_count FROM location  inner join listing on listing.location_id=location.id GROUP by location.country,location.city,location.zip_code');
        $stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['country'],' :',$row['city'],' :',$row['zip_code'],':    ',$row['listing_count']; ?>  </p> 


        
        
      <?php  
        
    }
    
    
}  
    
    

    
    
              
