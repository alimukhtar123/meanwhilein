<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$zip=filter_input(INPUT_GET,'zip',FILTER_UNSAFE_RAW);
$date_from=filter_input(INPUT_GET,'date_from',FILTER_UNSAFE_RAW);
$date_to=filter_input(INPUT_GET,'date_to',FILTER_UNSAFE_RAW);
$button_type=filter_input(INPUT_GET,'button',FILTER_UNSAFE_RAW);


if ($button_type=='city'){
    
    
    $stmt=$dbh->prepare('SELECT location.city, COUNT(brone.id) AS brone_count FROM brone inner join listing on brone.listing_id=listing.id inner JOIN location on listing.location_id=location.id WHERE brone.brone_status=1 and (brone.day_out>=:date_from or brone.day_in <=:date_to) GROUP BY location.city ');
    $stmt->bindValue(':date_from', $date_from,PDO::PARAM_STR);
    $stmt->bindValue(':date_to', $date_to,PDO::PARAM_STR);
    $stmt->execute();
    
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['city'],' :',$row['brone_count']; ?>  </p> 


        
        
      <?php  
        
    }
              
}
else if ($button_type =='zip'){
    
    $stmt=$dbh->prepare('SELECT location.zip_code, COUNT(brone.id) AS brone_count FROM brone inner join'
            . ' listing on brone.listing_id=listing.id inner JOIN location on listing.location_id=location.id'
            . ' WHERE brone.brone_status=1 and '
            . '(brone.day_out>=:date_from or brone.day_in <=:date_to) GROUP BY location.zip_code ');
    $stmt->bindValue(':date_from', $date_from,PDO::PARAM_STR);
    $stmt->bindValue(':date_to', $date_to,PDO::PARAM_STR);
    $stmt->execute();
    
   
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['zip_code'],' :',$row['brone_count']; ?>  </p> 


        
        
      <?php  
        
    }
    
}