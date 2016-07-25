<?php



require_once ('configcsc343.php');


session_start();
if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
         
}

$cancel=filter_input(INPUT_POST,'change',FILTER_UNSAFE_RAW);
$location_id= filter_input(INPUT_POST, 'location_id',FILTER_UNSAFE_RAW);
$listing_id= filter_input(INPUT_POST, 'listing_id',FILTER_UNSAFE_RAW);
$money= filter_input(INPUT_POST, 'cost',FILTER_UNSAFE_RAW);

$dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
$stmt=$dbh->prepare('SELECT brone_status FROM brone WHERE listing_id=:listing_id');
$stmt->bindValue(':listing_id', $listing_id);
$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);
$result=$row['brone_status'];

if($cancel==0 && $result!=1){
    
   
    
     $stmt =$dbh->prepare('UPDATE listing JOIN location on listing.location_id=location.id SET price=:price WHERE location.id=:location_id and listing.id=:listing_id');
     $stmt->bindValue(':location_id', $location_id);
     $stmt->bindValue(':listing_id', $listing_id);
      $stmt->bindValue(':price', $money);
     

     $stmt->execute();
     echo('You have succesfully change your rent price');
}

else if($result==1){
    
    echo ('UPPPSSS unfortunately you cant change price  this rent It is already broned');
    
}
else
{
    echo ('UPS SOMETHING WENT WRONG PLEASE TRY AGAIN');

}

?>
<form class="form" method="POST" action="listhouses.php">
   
        <button type="submit" class="button" name='type' value="logout" >Return back.</button>
