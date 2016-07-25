<?php

session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$brone_id=filter_input(INPUT_POST,'brone_id',FILTER_UNSAFE_RAW);


$stmt=$dbh->prepare('UPDATE brone SET brone.brone_status=0 WHERE brone.id=:brone_id');

$stmt->bindValue(':brone_id',$brone_id);
$stmt->execute();

echo('you have succesfully cancled your brone');

?>

<html>
    
    <style>
          body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
}
        
    </style>
  
</html>