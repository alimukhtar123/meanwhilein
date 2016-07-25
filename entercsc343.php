<?php

session_start();

require_once('configcsc343.php');//

$login = filter_input(INPUT_POST, 'u', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'p', FILTER_UNSAFE_RAW);


if(empty($login)||empty($password))
{
    $_SESSION['ERROR'] = 'insert correct login and password';
   header('Location: csc343.php');
   die();
  
   
}



$dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);


$stmt =$dbh->prepare('SELECT id,password_hash from user WHERE login=:login');
$stmt->bindValue(':login', $login);
$res=$stmt->execute();//send query to db










if(!$res){
	
		$_SESSION['ERROR']='ОШИБКА В БАЗЕ ДАННЫХ  '.print_r($stmt->errorInfo(),true);
   header('Location: csc343.php');
                
   die();
}



$res = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt=$dbh->prepare('SELECT status FROM  user  WHERE user.id=:user_id');

$stmt->bindValue(':user_id', $res['id']);


$res1=$stmt->execute();//send query to db


$row  = $stmt->fetch(PDO::FETCH_ASSOC);


if($res==false||!password_verify($password,$res['password_hash'])){
	
	$_SESSION['ERROR']='PASSWORD OR LOGIN IS INCORRECT, PLEASE TRY AGAIN ';
	
	header('Location: csc343.php');

        die();
}


else if($row['status']==0){
    
 ?>
    
  <html>
    
      
      <head>  </head>
      <body>
        
          <h1>Hey user, you account is currently deactivated</h1>
          <h2>If you want to activate it ,please click button below</h2>
          
           
          <form class="form" method="POST" action="main.php">
   
        <button type="submit" class="btn btn-primary btn-block btn-large " name='type' value="activate" >Activate my Account.</button>
          
          
      </body>
     
    </html>
    
    
    
    
  <?php
  
  $stmt=$dbh->prepare('UPDATE user SET  user.status=1  WHERE user.id=:user_id');


$stmt->bindValue(':user_id', $res['id']);


$res=$stmt->execute();//send query to db
    
}



else{
	
$_SESSION['id']=$res['id'];	
	header('Location: main.php');

}