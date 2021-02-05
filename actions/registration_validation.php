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

  

$mysql = new mysqli('localhost','root','','sewer');
  if (!$mysql) {
  die("Connection failed: " . mysqli_connect_error());
}

$result = (!validate_data($login,5,30,"login") +
             !validate_data($password,5,50,"password") +
             !validate_data($email,5,100,"email") +
             !validate_email($name,5,30,"name"));
  
  $login_verify = mysqli_query($mysql,"SELECT login FROM users WHERE login = '$login'");
  $login_verify = $login_verify->fetch_assoc();

  if (isset($login_verify['login'])){
    $result = true;
    $_SESSION['msg'] = "Такой логин уже зарегистрирован";
  }

  $email_verify = mysqli_query($mysql,"SELECT email FROM users WHERE email = '$email'");
  $email_verify = $email_verify->fetch_assoc();

  if (isset($email_verify['email'])) {
    $result = true;
    $_SESSION['msg'] = "E-mail ".$email_verify['email']." занят";
  }
 if ($result)
{
  header("Location: /money_sewer/?action=registration");
  exit();
}

$password = crypt($password,"solt531");



mysqli_query($mysql,"INSERT INTO users (login,password,name,email) 
  VALUES('$login','$password','$name','$email')");
mysqli_close($mysql);
$_SESSION['msg'] = "Регистрация прошла успешно";
header('Location: /money_sewer');
exit();

?>