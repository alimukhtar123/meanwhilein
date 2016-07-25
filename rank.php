<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


 $stmt=$dbh->prepare('SELECT * FROM (select user.name,country,COUNT(listing.id) as count_number FROM user inner join listing on user.id=listing.seller_id inner join location on location.id=listing.location_id GROUP BY user.name , location.country) as D ORDER BY country, count_number DESC');
    
$stmt->execute();
    
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<p> <?php echo $row['name'],' :',$row['country'],' :',$row['count_number']; ?>  </p> 


        
        
      <?php  
        
    }