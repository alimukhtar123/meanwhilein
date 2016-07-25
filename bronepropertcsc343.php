<?php

session_start();
require_once ('configcsc343.php');

if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}

 $dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$listing_id=filter_input(INPUT_POST,'listing_id',FILTER_UNSAFE_RAW);

$day_in=filter_input(INPUT_POST,'date_from',FILTER_UNSAFE_RAW);




$day_out=filter_input(INPUT_POST,'date_to',FILTER_UNSAFE_RAW);


$cardholder_name=filter_input(INPUT_POST,'cardholder_name',FILTER_UNSAFE_RAW);
$card_number=filter_input(INPUT_POST, 'card_number',FILTER_UNSAFE_RAW);
$cvc_number=filter_input(INPUT_POST, 'cvc_number',FILTER_UNSAFE_RAW);
$card_type=filter_input(INPUT_POST,'card_type',FILTER_UNSAFE_RAW);




$stmt=$dbh->prepare('SELECT id from listing where id=:listing_id and date_from<=:day_in and date_to>=:day_out and active_list=1');

$stmt->bindValue(':day_in', $day_in,PDO::PARAM_STR);
$stmt->bindValue(':day_out', $day_out,PDO::PARAM_STR);
$stmt->bindValue(':listing_id', $listing_id);

$stmt->execute();



if ($stmt->fetch()==false){
    
    echo ('The listing does not exist or has been canceled by the owner of property :( ');
    
    die();
}



$stmt=$dbh->prepare('SELECT `id` from `brone`  WHERE `listing_id`=:listing_id and `brone_status`=1 and'
        . ' (`day_out` BETWEEN :date_from and :date_to  or  `day_out` BETWEEN :date_from and :date_to  '
        . 'or :date_from BETWEEN `day_in` and `day_out`)');





$stmt->bindValue(':date_from', $day_in,PDO::PARAM_STR);
$stmt->bindValue(':date_to', $day_out,PDO::PARAM_STR);
$stmt->bindValue(':listing_id', $listing_id);

$stmt->execute();





if ($stmt->fetch()!==false){
    
    echo ('UPS seems like house is already broned');
    
}

$stmt=$dbh->prepare('INSERT into payment(cardholder_name,card_number,cvc_number,card_type) VALUES(:cardholder_name,:card_number,:cvc_number,:card_type)');

$stmt->bindValue(':cardholder_name', $cardholder_name);
$stmt->bindValue(':card_number', $card_number);
$stmt->bindValue(':cvc_number', $cvc_number);
$stmt->bindValue(':card_type', $card_type);
$stmt->execute();
$payment_id=$dbh->lastInsertId();



$stmt=$dbh->prepare('INSERT  into brone (day_in,day_out,broner_id,listing_id,payment_id) VALUES (:day_in,:day_out,:broner_id,:listing_id,:payment_id)');


$stmt->bindValue(':day_in', $day_in);
$stmt->bindValue(':day_out', $day_out);
$stmt->bindValue(':broner_id', $_SESSION['id']);
$stmt->bindValue(':listing_id', $listing_id);
$stmt->bindValue(':payment_id', $payment_id);


$stmt->execute();

$brone_id=$dbh->lastInsertId();

echo("you brone was succes");