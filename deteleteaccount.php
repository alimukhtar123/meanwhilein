<?php



require_once ('configcsc343.php');


session_start();
if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
         
}

$dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$stmt=$dbh->prepare('UPDATE user SET  user.status=0  WHERE user.id=:user_id');


$stmt->bindValue(':user_id', $_SESSION['id']);


$res=$stmt->execute();//send query to db


if($res){
    
    header("Location:csc343.php");
    die();
   
}



