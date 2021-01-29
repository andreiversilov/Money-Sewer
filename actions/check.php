<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(!isset($_SESSION)){
    session_start();
}
require_once "../functions.php";

 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);

  $name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
 
  $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);

  $email = filter_var(trim($_POST['email']),
 FILTER_SANITIZE_STRING);

  $result = (!validate_data($login,5,100,"login") +
             !validate_data($password,5,100,"password") +
             !validate_data($email,5,100,"email") +
             !validate_data($name,5,100,"name"));

 if ($result)
{
  header("Location: /money_sewer/?action=registration");
  exit();
}



$mysql = new mysqli('localhost','root','','sewer');
  if (!$mysql) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($mysql,"INSERT INTO users (login,password,name,email) 
  VALUES('$login','$password','$name','$email')");
mysqli_close($mysql);
$_SESSION['msg'] = "Регистрация прошла успешно";
header('Location: /money_sewer');
exit();

?>