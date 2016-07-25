<?php

require_once('configcsc343.php');
$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$location = filter_input(INPUT_GET, 'location', FILTER_SANITIZE_NUMBER_INT);





$stmt = $dbh->prepare('SELECT AVG (price) as price,type FROM location inner join listing on listing.location_id=location.id WHERE  city=(SELECT city FROM location WHERE id=:location_id) GROUP BY type' );
$stmt->bindValue(':location_id', $location);
$res=$stmt->execute();

?>
<h2>Our record indicate that suggested rent price in your region is </h2>
<?php



while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
    ?> 
    <p> For type  <?php  echo $row['type']?> rent price is : <?php echo round($row['price'])?> $</p> 
    <?php
}




?>




<h2>Our record indicate that suggested rent price in your region is </h2>
    


    
<form action='rentpropertycsc343.php' method='post'>
    <input type='hidden' name='location' value='<?php echo $location ?>' />
    <select name="type">
        <option>
            apartment
    </option>
    <option>
            room
    </option>     
    <option>
            house
    </option>
     
</select>
    <br>  
    <?php
    $stmt = $dbh->prepare('SELECT id,name FROM available_amenities' );

$res=$stmt->execute();
    while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            ?>
    <input type="checkbox" name="amenities[]" value="<?php echo $row['id']?>" > <?php echo $row['name'] ?> <br>
    
    
    <?php
        }
    
    ?>
    
    
  Start  date  <input type="date" name ="datefrom">  <br> 
    
   End Date to <input type="date" name ="dateto"> <br>
    
    
  Price  <input type="money" name="cost"> <br>
    
  
<button type='submit'>Rent out</button>
 


    
    
    
</form>



<h2>Dear user, please note   having certain utities might help to increase price of your rent</h2>

<h3>Below are recommended amenities to have and their effect on your rent price. </h3>


<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
body {
  background: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/giftly.png);
}
.btn{

   position:fixed;
   right:10px;
   top:5px;
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
.btn:hover {background-color: #3e8e41}

.btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Amenity</th>
    <th colspan="2">Price</th>
  </tr>
  <tr>
    <td>Laundry in Building</td>
    <td>20$</td>
   
  </tr>
  
  <tr>
    <td>Closet Space</td>
    <td>25$</td>
   
  </tr>
  <tr>
    <td>Large Windows</td>
    <td>30$</td>
   
  </tr>
  <tr>
    <td>Outdoor Space- Balcony or Yard Access</td>
    <td>50$</td>
   
  </tr>
  <tr>
    <td>Central Air Conditioning</td>
    <td>70$</td>
   
  </tr>
  <tr>
    <td>Desk/workspace</td>
    <td>15$</td>
   
  </tr>
  <tr>
    <td>TV</td>
    <td>20$</td>
   
  </tr>
  <tr>
    <td>Gym</td>
    <td>100$</td>
   
  </tr>
  <tr>
    <td>Jacuzzi tub</td>
    <td>120$</td>
   
  </tr>
  <tr>
    <td>Theater</td>
    <td>150$</td>
   
  </tr>
  <tr>
    <td>Outdoor pool</td>
    <td>125$</td>
   
  </tr>
  
</table>

<br>


<h3>We are trying to serve you our best,so if you cant find those amenities in our list, please go ahead and click link below to add one</h3>

<a href="amenities.php">Add you own amenities</a>

 

      <form class="form" method="POST" action="logout1.php">
   
        <button type="submit" class="btn btn-primary btn-block btn-large " name='type' value="logout" >Logout.</button>
         
        
         

      </form>

<form class="form" method="POST" action="listhouses.php">
   
        <button type="submit" class="button" name='type' value="logout" >Return back.</button>

<form class="form" method="POST" action="useraccount.php">
   
        <button type="submit" class="button" name='type' value="logout" >My profile.</button>
         
        
         

      </form>

