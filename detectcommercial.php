<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

 $stmt=$dbh->prepare('SELECT user_count.id,user_count.name, user_count.city,user_count.country  FROM (
SELECT country,city,COUNT(listing.id) AS listing_count FROM location  inner join listing on listing.location_id=location.id 
GROUP by location.country,location.city) AS country_count inner join (SELECT country,name,city,user.id,COUNT(listing.id) 
AS listing_count FROM location  inner join listing on listing.location_id=location.id inner join user on listing.seller_id=user.id 
GROUP by location.country,location.city,user.name,user.id)
as user_count on country_count.country = user_count.country and  country_count.city=user_count.city 
WHERE user_count.listing_count>=country_count.listing_count/10');
    
$stmt->execute();

 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo "user id",':',$row['id'],":", $row['name'],' :',$row['city'],' :',$row['country']; ?>  </p> 


        
        
      <?php  
        
    }