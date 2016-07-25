
<?php

session_start();
require_once ('configcsc343.php');

if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}


$user_to=filter_input(INPUT_POST,'user_id',FILTER_UNSAFE_RAW);
$type_ranking=filter_input(INPUT_POST,'name',FILTER_UNSAFE_RAW);
$comment=filter_input(INPUT_POST,'comment',FILTER_SANITIZE_SPECIAL_CHARS);
$star_number=filter_input(INPUT_POST,'star_number',FILTER_SANITIZE_NUMBER_INT);





 $dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
 
 $stmt=$dbh->prepare('INSERT INTO rating(user_to_id,user_from_id,type_ranking,star_number,comment) VALUES (:user_to_id,:user_from_id,:type_ranking,:star_number,:comment)');
 
 $stmt->bindValue(':user_from_id', $_SESSION['id']);
  $stmt->bindValue(':user_to_id', $user_to);
    $stmt->bindValue(':comment', $comment);
    $stmt->bindValue(':type_ranking', $type_ranking,PDO::PARAM_STR);
 $stmt->bindValue(':star_number', $star_number);
 
$stmt->execute();



  
 echo('You have succesfully left a comment about chosen hoster');