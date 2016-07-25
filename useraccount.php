<?php

require_once ('configcsc343.php');

session_start();


if (isset ($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];  //displays all erorr from newuser	
	unset($_SESSION['ERROR']);// deletes error after displaying it
        
}



?>
<html>
    <head>
        <style>
            
body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
}            
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

 .button1 {
  width: 20%;
  padding: 5px;
  border-radius: 5px;
  outline: none;
  border: none;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F));
  background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: linear-gradient(#28D2DE 0%, #1A878F 100%);
  font: 14px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  border: 1px solid #000;
  opacity: 0.7;
  -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  border-top: 1px solid rgba(255, 255, 255, 0.8) !important;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255, 255, 255, 0.2)));
    
}
 .button2 {
  width: 20%;
  padding: 5px;
  border-radius: 5px;
  outline: none;
  border: none;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F));
  background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: linear-gradient(#28D2DE 0%, #1A878F 100%);
  font: 14px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  border: 1px solid #000;
  opacity: 0.7;
  -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  border-top: 1px solid rgba(255, 255, 255, 0.8) !important;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255, 255, 255, 0.2)));
    
}
 .button3 {
  width: 20%;
  padding: 5px;
  border-radius: 5px;
  outline: none;
  border: none;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F));
  background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: linear-gradient(#28D2DE 0%, #1A878F 100%);
  font: 14px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  border: 1px solid #000;
  opacity: 0.7;
  -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7);
  border-top: 1px solid rgba(255, 255, 255, 0.8) !important;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255, 255, 255, 0.2)));
    
}
</style>
</head>
</style>
    </head>
    
    <body>
        
        <?php
       
  $dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
  
  $stmt=$dbh->prepare('SELECT location.id,location.street_address,location.city FROM location
INNER JOIN listing ON listing.location_id = location.id
INNER JOIN brone ON brone.listing_id = listing.id
WHERE brone.broner_id = :user_id  AND date_from <= NOW() AND brone.brone_status = 1');
   
  
 $stmt->bindValue(":user_id", $_SESSION['id']) ;
 
$stmt->execute();

$result=$stmt->fetchAll(PDO::FETCH_ASSOC);


if(count($result)>0){
    ?>
    
        
       
     <form class="form" method="POST" action="commentproperty.php">
         <h2>Below is list of all properties that you have broned</h2>
         <select name="location_id">
             
             <?php
             
                 foreach ($result as $row){
                     
                     echo "<option value='{$row['id']}'>{$row['street_address']} {$row['city']}</option>";
                     
                     
                     
                 }
             
             ?>
             
             <br>
            
         </select>
         <br>
         <h3>Write about experience in property</h3>
         <textarea name='comment' rows="10" cols="50">

         </textarea>
         <br>
         
         <h4>Rate by 5 start ranking </h4>
            <select name="star_number" required="required">
        <option>
            1
    </option>
    <option>
            2
    </option>     
    <option>
            3
    </option>
    <option>
            4
    </option>
       <option>
            5
    </option>
     
</select>
         
         
         
         
        <button type="submit" class="button1">Comment.</button>
         
        
        
     </form>
        
        
        
        
    
    
    
    
    <?php
    
}
        

        ?>
        
        
        <h2>Below you can leave comments about renter</h2>
        
        <?php
 
        
        
$stmt=$dbh->prepare('SELECT user.id,user.name FROM user INNER JOIN brone ON brone.broner_id = user.id INNER JOIN listing ON brone.listing_id = listing.id WHERE listing.seller_id = :user_id AND date_from <= NOW() AND brone.brone_status = 1');
   
$stmt->bindValue('user_id',$_SESSION['id']);       
 
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

               
  if(count($result)>0){
?>
    
        <form class="form" method="POST" action="commentrenter.php">
          <input type="hidden" name="name" value='renter' /><br>
         <h2>Below is list of all renters  who have rented your property so far</h2>
         <select name="user_id">
             
             <?php
             
                 foreach ($result as $row){
                     
                     echo "<option value='{$row['id']}'>{$row['name']}</option>";
                     
                     
                     
                 }
             
             ?>
        
         <br>
            
         </select>
         <br>
         <h3>Write about experience in property</h3>
         <textarea name='comment' rows="10" cols="50">

         </textarea>
         <br>
         
         <h4>Rate by 5 start ranking </h4>
            <select name="star_number" required="required">
        <option>
            1
    </option>
    <option>
            2
    </option>     
    <option>
            3
    </option>
    <option>
            4
    </option>
       <option>
            5
    </option>
     
</select>
         
         
         
         
        <button type="submit" class="button2 "   >Comment.</button>
         
        
        
     </form>
        
  
    
    <?php
    
}
?>
        
        
        
        
        
        
        
            <h2>Below you can leave comments about hosts</h2>
        
        <?php
 
        
        
$stmt=$dbh->prepare('SELECT user.id,user.name FROM user INNER JOIN listing ON listing.seller_id = user.id INNER JOIN brone ON brone.listing_id = listing.id WHERE brone.broner_id = :user_id  AND date_from <= NOW() AND brone.brone_status = 1 ');
   
$stmt->bindValue('user_id',$_SESSION['id']);       
 
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

               
  if(count($result)>0){
?>
    
        <form class="form" method="POST" action="commenthoster.php">
          <input type="hidden" name="name" value='rentee' /><br>
         <h2>Below is list of all hosts whose propeties you have broned so far</h2>
         <select name="user_id">
             
             <?php
             
                 foreach ($result as $row){
                     
                     echo "<option value='{$row['id']}'>{$row['name']}</option>";
                     
                     
                     
                 }
             
             ?>
        
         <br>
            
         </select>
         <br>
         <h3>Write about experience in property</h3>
         <textarea name='comment' rows="10" cols="50">

         </textarea>
         <br>
         
         <h4>Rate by 5 start ranking </h4>
            <select name="star_number" required="required">
        <option>
            1
    </option>
    <option>
            2
    </option>     
    <option>
            3
    </option>
    <option>
            4
    </option>
       <option>
            5
    </option>
     
</select>
         
         
         
         
        <button type="submit" class="button3 "   >Comment.</button>
         
        
        
     </form>
        
  
    
    <?php
    
}
?>
          
        

        
        
        

        <h2>If you want to deactive account ,please click button below or if you changed your mind click return button in order to return to main page </h2>
        <p>Please note , after deactivation of  your  profile your account will be frozen ,but you can always return back !</p>
        
        
        
        
        <form class="form" method="POST" action="deteleteaccount.php">
   
        <button type="submit" class="button " name='type' value="delete" >Deactivate Account.</button>
         
        
         

      </form>
        
        
          <form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button ">Return to Main Page.</button>
         
        
         

      </form>
        
       
        
    </body>

    

    
    
</html>