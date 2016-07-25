<?php
session_start();
require_once('configcsc343.php');

if(!isset($_SESSION['id']))
{
    
    
   
	 Header('Location: csc343.php');
	die();
        
       
         
}


$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

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
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
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
    
    <body>
        
<form class="form" method="GET" action="reportcsc343.php">
  
	
        <h2>Please enter zip code of the house that you want to find</h2>

          <input type="date" name="date_from" placeholder="date_from"  />
          <input type="date" name="date_to" placeholder="date_to"  /> <br>
          <button type="submit" class="button " name='button' value='zip'>Search by Zip.</button><br>
          <button type="submit" class="button" name='button' value='city'>Search by city.</button>
        </form>
        
        
     <form class="form" method="GET" action="report1csc343.php">
  
	
        <h2>Search  by city and/or country and/or zip code</h2>

       
        <button type="submit" class="button " name='button' value='country'>Search by country.</button> <br>
        
        <button type="submit" class="button " name='button' value='countrycity'>Search by country and city.</button><br>

        <button type="submit" class="button" name='button' value='countrycityzip'>Search by country zip and city.</button> <br>
        
        </form>
           
        
        <h2>Please enter button to get rank <h2>

       
            <form class="form" method="GET" action="rank.php">


          <button type="submit" class="button1" >Rank listing</button>
        </form>
                
                
            <h2>Detect commercials<h2>

       
            <form class="form" method="GET" action="detectcommercial.php">


          <button type="submit" class="button1" >Rank listing</button>
        </form>     
           
                
                    
                     <h2>Rank renter by date and city</h2>
             <form class="form" method="GET" action="userrank.php">
                    
                
                 
            <input type="date" name="date_from" placeholder="date_from"/>
            <input type="date" name="date_to" placeholder="date_to"  /><br>
            
                 
            
                 
             <button type="submit" class="button2" name='button' value='firstrank' >Rank renter by time</button><br>
             <button type="submit" class="button2" name='button' value='secondrank'>Rank renter by city </button>
        </form>     
                   
                
                
                    
                    <h2>Find Largest host and renter cancelations </h2> 
                    
                    
        <form class="form" method="POST" action="cancelations.php">


            <button type="submit" class="button3" name='button' value='hostcancelation' >Find Host Cancelations</button> <br>
          <button type="submit" class="button3" name='button' value='rentercancelation'>Find Renter cancelations </button>
        </form>           
        
        
        
        
        
        
        
        
        
        
        
        </body>

    
</html>