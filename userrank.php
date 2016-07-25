<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$date_from=filter_input(INPUT_GET,'date_from',FILTER_UNSAFE_RAW);
$date_to=filter_input(INPUT_GET,'date_to',FILTER_UNSAFE_RAW);
$button_type=filter_input(INPUT_GET,'button',FILTER_UNSAFE_RAW);


if($button_type=='secondrank'){
    
    
    $stmt=$dbh->prepare('SELECT user.id,user.name,location.country,location.city,count(brone.id) as brone_count from user inner join brone on user.id=brone.broner_id '
            . 'inner join listing on listing.id=brone.listing_id inner join location on location.id=listing.location_id inner join '
            . '(SELECT user.id FROM user inner join brone on user.id=brone.broner_id WHERE year(brone.day_out)=year(:date_to) GROUP BY user.id HAVING count(brone.id)>=2) '
            . 'as user_did_two  on user.id=user_did_two.id WHERE brone.day_out>=:date_from and brone.day_in <=:date_to '
            . 'GROUP BY user.id, user.name,location.country,location.city ORDER BY location.country,location.city,brone_count DESC');
    
    $stmt->bindValue(':date_from', $date_from,PDO::PARAM_STR);
$stmt->bindValue(':date_to', $date_to,PDO::PARAM_STR);
$stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['id'],' :',$row['name'],' :',$row['country'],' :',$row['city'],' :',$row['brone_count']; ?>  </p> 


        
        
      <?php  
        
    }
    
    
}

else if ($button_type='firstrank'){
    
    $stmt=$dbh->prepare('SELECT user.id,user.name,count(brone.id) as brone_'
            . 'count from user inner join brone on'
            . ' user.id=brone.broner_id WHERE brone.day_out>=:date_from and brone.day_in <=:date_to GROUP BY user.id, user.name ORDER BY brone_count DESC');
    
    $stmt->bindValue(':date_from', $date_from,PDO::PARAM_STR);
$stmt->bindValue(':date_to', $date_to,PDO::PARAM_STR);
$stmt->execute();
    
     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['id'],' :',$row['name'],':',$row['brone_count']; ?>  </p> 


        
        
      <?php  
        
    }
    
    
    
}
