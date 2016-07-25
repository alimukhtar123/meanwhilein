<?php

session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
$button_type=filter_input(INPUT_POST,'button',FILTER_UNSAFE_RAW);


if($button_type=='hostcancelation'){

$stmt=$dbh->prepare('SELECT seller_id ,count1, name FROM (SELECT COUNT(seller_id) '
        . 'AS count1,seller_id,user.name FROM user inner join listing on listing.seller_id=user.id where listing.active_list=0 '
        . ' GROUP BY seller_id,name) as t1 ORDER BY count1 DESC LIMIT 1 ');

$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        
       ?> 
        
<h3> The  host  with largest amount of property cancelations is  <?php echo $row['name']; ?> with total amount of cancelations =<?php echo $row['count1'] ?> </h3> 

<?php



}
}

else if ($button_type == 'rentercancelation'){
    $stmt=$dbh->prepare('SELECT broner_id ,count1, name FROM '
            . '(SELECT COUNT(broner_id) AS count1,broner_id ,name FROM user inner join brone on user.id=brone.broner_id where brone.brone_status=0  '
            . 'GROUP BY broner_id,name) as t1 ORDER BY count1 DESC LIMIT 1');
    $stmt->execute();
    
    while($row1=$stmt->fetch(PDO::FETCH_ASSOC)){
        
    ?>

<h3> The renter with largest amount of brone cancelations is <?php echo $row1['name']?> with total amount of cancelations =<?php echo $row1['count1'] ?>  </h3>



<?php
        
        
        
        
        
    }
    
    
    
    
}
