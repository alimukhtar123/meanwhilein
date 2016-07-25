<?php

require_once('configcsc343.php');
session_start();

$_SESSION['id']='1';


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);




if( empty($name)  )
{
		$_SESSION['ERROR']='you have not entered required parameters';
    header('Location: amenities.php');
                die();
}



$dbh =new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);
$stmt = $dbh->prepare('INSERT INTO available_amenities(name) VALUES(:name)');
$stmt->bindValue(':name', $name);
$res = $stmt->execute();

;

if($res)
{
    
     header('Location: amenities.php');
}
else
{
    
    echo('aaaa');
	$_SESSION['ERROR']='ОШИБКА В БАЗЕ ДАННЫХ  '.print_r($stmt->errorInfo(),true);
    header('Location: amenities.php');
       
    
  }