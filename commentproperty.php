
<?php

session_start();
require_once ('configcsc343.php');

if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}


$location_id=filter_input(INPUT_POST,'location_id',FILTER_UNSAFE_RAW);
$comment=filter_input(INPUT_POST,'comment',FILTER_SANITIZE_SPECIAL_CHARS);
$star_number=filter_input(INPUT_POST,'star_number',FILTER_SANITIZE_NUMBER_INT);





 $dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
 
 $stmt=$dbh->prepare('INSERT INTO ranking_house (user_from_id,house_id,star_number,comment) VALUES (:user_from_id,:house_id,:star_number,:comment)');
 
 
 $stmt->bindValue(':user_from_id', $_SESSION['id']);
  $stmt->bindValue(':house_id', $location_id);
    $stmt->bindValue(':comment', $comment);
 $stmt->bindValue(':star_number', $star_number);
 
$stmt->execute();



  
 echo('You have succesfully left a comment about chosen property');