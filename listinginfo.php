<?php


require_once ('configcsc343.php');

session_start();


if (isset ($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];  //displays all erorr from newuser	
	unset($_SESSION['ERROR']);// deletes error after displaying it
        
}


$listing_id = filter_input(INPUT_GET, 'listing_id', FILTER_SANITIZE_NUMBER_INT);

$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);



$stmt=$dbh->prepare('SELECT brone.id, day_in,day_out,brone_status,name FROM brone inner join user on brone.broner_id=user.id WHERE brone.listing_id=:listing_id ');

$stmt->bindValue(':listing_id', $listing_id);

$stmt->execute();

if (empty($row=$stmt->fetch(PDO::FETCH_ASSOC))){
    
    ?>



<h1>Unfortunately our records indicate that  your property has not been  broned yet, we recommend you to wait a bit.</h1>



<form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button" >Return To Main  MENU .</button>

<?php
    
    
    
    
    
}








while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
   
   
    
    ?>
    <h2> Your  brone number is: <?php echo $row['id']?> </h2>
 
    <h3> Start date:  <?php echo $row['day_in'] ?>  </h3>
    <h3> End date:  <?php echo $row['day_out'] ?>  </h3>
    <h3>Current brone status is :  <?php 
        if ( $row['brone_status']=1) 
            {
            echo ('Active');
                    
            } 
            else {
                    echo(' brone has been canceled');
            }
                    
                    ?> </h3>
    <h3>House was rented by :  <?php echo $row['name'] ?> </h3>
    <br>
    
    
<form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button" >Return To Main  MENU .</button>
    <?php
  
    
    
}



    



?>  