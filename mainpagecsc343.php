<?php
session_start();
require_once('configcsc343.php');



if(!isset($_SESSION['id']))
{
	 header('Location: csc343.php');
	die();
        
       
         
}


#$_SESSION['id']='1';


$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_SPECIAL_CHARS);
$streetadress = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_SPECIAL_CHARS);
$country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
$province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_SPECIAL_CHARS);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_SPECIAL_CHARS);



if( empty($zip)  ||  empty($province)  ||  empty($longitude)  ||  empty($latitude)  ||  empty($city)  ||  
        empty($country)||empty($streetadress))
{
		$_SESSION['ERROR']='you have not entered required parameters';
    header('Location: mainpage.php');
                die();
}



$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt = $dbh->prepare('INSERT INTO location(street_address,zip_code, city,province,country,longitude,latitude) VALUES(:street_address, :zip_code, :city,:province, :country, :longitude,:latitude)');
$stmt->bindValue(':street_address', $streetadress);
$stmt->bindValue(':zip_code', $zip);
$stmt->bindValue(':city', $city);
$stmt->bindValue(':province', $province);
$stmt->bindValue(':country', $country);
$stmt->bindValue(':longitude', $longitude);
$stmt->bindValue(':latitude', $latitude);
$res = $stmt->execute();
$address_id=$dbh->lastInsertId();

$stmt=$dbh->prepare('INSERT INTO rentedproperties(user_id,location_id) VALUES (:user_id,:location_id)');
$stmt->bindValue(':user_id',$_SESSION['id']);
$stmt->bindValue(':location_id',$address_id);

$res=$stmt->execute();

if($res)
{
    
     header('Location: listhouses.php');
}
else
{
    
    echo('aaaa');
	$_SESSION['ERROR']='ОШИБКА В БАЗЕ ДАННЫХ  '.print_r($stmt->errorInfo(),true);
    header('Location: mainpage.php');
       
    
  }