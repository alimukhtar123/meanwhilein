<?php

require_once ('configcsc343.php');


session_start();


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt = $dbh->prepare('SELECT id, street_address,zip_code,city,province,country,longitude,latitude FROM location inner join rentedproperties ON location.id=rentedproperties.location_id WHERE rentedproperties.user_id=:user_id');

$stmt->bindValue(':user_id', $_SESSION['id']);
$res = $stmt->execute();

?>
<html>
    
    <head>
        
        
          <style>
 input[type="submit"] {
  width: 100%;
  padding: 15px;
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

body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
}

/*sass variables used*/
/*site container*/
.wrapper {
  width: 420px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  padding: 30px 0px 0px 0px;
  font: 25px Oswald;
  color: #FFF;
  text-transform: uppercase;
  text-shadow: #000 0px 1px 5px;
  margin: 0px;
}

p {
  font: 13px Open Sans;
  color: #6E6E6E;
  text-shadow: #000 0px 1px 5px;
  margin-bottom: 30px;
}

.form {
  width: 100%;
}


ol {
    display: block;
    color:red;
    list-style-type: decimal;
    font-size: 20px;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
   
}


input:focus {
  box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.7), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
  background: rgba(0, 0, 0, 0.3);
  -webkit-transition: 1s ease;
  -moz-transition: 1s ease;
  -o-transition: 1s ease;
  -ms-transition: 1s ease;
  transition: 1s ease;
}



.button {
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
    
  position:absolute;
   top:40;
   right:0;
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
    
  position:absolute;
   top:122;
   right:0;
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
    
  position:absolute;
   top:80;
   right:0;
}
.button:hover {
  opacity: 1;
  cursor: pointer;
}
.button1:hover {
  opacity: 1;
  cursor: pointer;
}
.button2:hover {
  opacity: 1;
  cursor: pointer;
}

.button3:hover {
  opacity: 1;
  cursor: pointer;
}

.optimize {
  position: fixed;
  right: 3%;
  top: 0px;
}

</style>

    </head>
    
            
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="wrapper">
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    
    <body>
        <?php
	
  
	if (isset ($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];  //displays all erorr from newuser	
	unset($_SESSION['ERROR']);// deletes error after displaying it
}
	?>
        <h1>Your properties:</h1>
        <ol >
        
   
        <?php
        
        while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <li><a href='houseinfo.php?location_id=<?php echo $row['id'];?>'>Adress of your Property: <?php echo $row['street_address'],' ',$row['zip_code'],' ',$row['city'],' ',$row['province'],' ',$row['country'],' ',$row['longitude'],' ',$row['latitude']; ?>  
        
        
        <form action='rentproperty.php' method='get'>
         <input type='hidden' name='location' value='<?php echo $row['id']; ?>' />
         <button type='submit' class="button">Rent out</button>
        </form>
            
                </a>
            
            
        
        </li>
            
        
            <?php
            
        }
       
        

 ?>       
        
        
        
    </ol>
        
    
    
    
    
    
      <form class="form" method="POST" action="logout1.php">
   
        <button type="submit" class="button1" name='type' value="logout" >Logout.</button>
         
        
         

      </form>
    
    
        
        <form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button2" name='type' value="logout" >My profile.</button>
        </form>
        
         

      
    
        <form class="form" method="POST" action="main.php">
   
        <button type="submit" class="button3 "  >Return to mainpage.</button>
         
        
         

      </form>
    
    
    
    
    </body>
    
</html>
