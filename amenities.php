<?php
session_start();
require_once('configcsc343.php');
$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);



$stmt = $dbh->prepare('SELECT name FROM available_amenities  ');

$res = $stmt->execute();

?>
<html>
    
    <body>
        <?php
	
  
	if (isset ($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];  //displays all erorr from newuser	
	unset($_SESSION['ERROR']);// deletes error after displaying it
}
	?>
        <p>Your available amenitie:</p>
    <lo>
        
   
        <?php
        
        while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            ?>
        <li> <?php echo $row['name'] ?>  
        
            
            
        
        </li>
            
        
            <?php
            
        }
       
        
        
        

 ?>       
        
        
        
    </lo>
        
    <form method="POST" action="addamenities.php">
        <input name="name" type="text">
        
        
        <button type="submit"> 
        ADD:
        </button>
            
            
    </form>
    
    
    </body>
    
</html>
