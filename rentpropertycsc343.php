<?php


session_start();


if(!isset($_SESSION['id']))
{
    
    
        
	 header('Location: csc343.php');
	die();
        
       
         
}

require_once ('configcsc343.php');


$housetype = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
#$amenities = filter_input(INPUT_POST, '', FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'cost',FILTER_SANITIZE_NUMBER_FLOAT);
$location = filter_input(INPUT_POST, 'location',FILTER_SANITIZE_NUMBER_INT);

$datefrom = filter_input(INPUT_POST, 'datefrom',FILTER_UNSAFE_RAW);
$dateto = filter_input(INPUT_POST, 'dateto',FILTER_UNSAFE_RAW);


$amenities=array();


foreach ($_POST['amenities'] as $a ){   

    $amenities[]=filter_var($a,FILTER_SANITIZE_NUMBER_INT);
   
}

if (empty ($housetype) || empty ($price)||empty($location) ){
     
  
    
   header("Location:rentproperty.php");
   die();
}



$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);



$stmt=$dbh->prepare('INSERT  into listing(type,location_id,seller_id,date_from,date_to,price) VALUES (:type,:location_id,:seller_id,:date_from,:date_to,:price)');

$stmt->bindValue(':type',$housetype);
$stmt->bindValue(':location_id',$location);
$stmt->bindValue(':seller_id', $_SESSION['id']);

$stmt->bindValue(':date_from', $datefrom);
$stmt->bindValue(':date_to',$dateto);
$stmt->bindValue(':price',$price);

$res = $stmt->execute();



$listing_id=$dbh->lastInsertId();

$stmt=$dbh->prepare('INSERT into listing_amenities(amenity_id,listing_id) VALUES(:amenity_id,:listing_id)');

$stmt->bindValue(':listing_id',$listing_id);

foreach ($amenities as $a){


$stmt->bindValue(':amenity_id', $a);
$res = $stmt->execute();
}


echo('you have sucesfully put your propert for rent');