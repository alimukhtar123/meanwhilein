<?php
require_once('configcsc343.php');

session_start();

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass1 = filter_input(INPUT_POST, 'password1', FILTER_UNSAFE_RAW);
$pass2 = filter_input(INPUT_POST, 'password2', FILTER_UNSAFE_RAW);

$zip = filter_input(INPUT_POST, 'zipadress', FILTER_SANITIZE_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$streetadress = filter_input(INPUT_POST, 'streetadress', FILTER_SANITIZE_SPECIAL_CHARS);
$country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
$province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_SPECIAL_CHARS);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_SPECIAL_CHARS);



$sin = filter_input(INPUT_POST, 'sin', FILTER_SANITIZE_SPECIAL_CHARS);
$dateofbirth = filter_input(INPUT_POST, 'birthdaydate', FILTER_SANITIZE_SPECIAL_CHARS);
$occupation = filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_SPECIAL_CHARS);




// 2 Проверить, что он ввёл все данные

if( empty($login) || empty($email) || empty($pass1) || empty($pass2) || empty($zip)  
      ||  empty($province)  ||  empty($longitude)  ||  empty($latitude)  ||  empty($city)  ||  
        empty($country)   ||  empty($sin) ||  empty($dateofbirth)  ||  empty($occupation))
{
		$_SESSION['ERROR']='you have not entered required parameters';
    header('Location: register.php');
               
                die();
}

// 3 Проверить, что пароли одинаковые и не пустые

if( $pass1 != $pass2 )
{
		$_SESSION['ERROR']='you have entered different passwords';
    header('Location: register.php');
                
                die();
}

// 4 Проверить, что имя пользователя не занято

$dbh = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8", $dbuser, $dbpass);

$stmt =$dbh->prepare('SELECT id FROM user WHERE login=:login');
$stmt->bindValue(':login',$login);
$stmt->execute();
$res=$stmt->fetch();

if ($res!==false)
{
    $_SESSION['ERROR']='USER WITH THIS LOGIN ALREADY EXISTS';
    header('Location: register.php');
   die();
    
}
    
    
    
// 5 Хеширует пароль

//http://php.net/manual/en/function.password-hash.php
$options = [ 'cost' => 12 ];
$passhash = password_hash($pass1, PASSWORD_DEFAULT, $options);


// 6 Добавляем пользователя в БД

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


//read last inser id and then add to user when u add to user
$stmt = $dbh->prepare('INSERT INTO   user(login,password_hash,name,lastname, address_id,sin,date_birth,occupation,mail) VALUES(:login, :password_hash,:name,:lastname,:address_id,:sin,:date_birth,:occupation,:mail)');


$stmt->bindValue(':login', $login);
$stmt->bindValue(':password_hash', $passhash);

$stmt->bindValue(':name', $name);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':address_id', $address_id);

$stmt->bindValue(':sin', $sin);
$stmt->bindValue(':date_birth', $dateofbirth);
$stmt->bindValue(':occupation', $occupation);
$stmt->bindValue(':mail', $email);

$res = $stmt->execute();

if($res)
{
    
     header('Location: csc343.php');
}
else
{
    
    echo('aaaa');
	$_SESSION['ERROR']='ОШИБКА В БАЗЕ ДАННЫХ  '.print_r($stmt->errorInfo(),true);
    header('Location: register.php');
       
    
  }
  
