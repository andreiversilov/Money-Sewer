<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if(!isset($_SESSION)){
    session_start();
}
require_once "../functions.php";
require_once "../connection.php";

 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);

$password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);

 $result = (!validate_data($login,5,100,"login") +
             !validate_data($password,5,100,"password"));

 if ($result) {
  header("Location: /money_sewer/?action=auth");
  exit();
}

$password = crypt($password,"solt531");


$res = mysqli_query($mysql,"SELECT * FROM users WHERE password = '$password' AND login = '$login'");
$user = $res->fetch_assoc();
if (empty($user)) {

  $_SESSION['msg'] = "Неверно введены логин или пароль";
   header("Location: /money_sewer/?action=auth");
   mysqli_close($mysql); 
   exit();
}
setcookie('user',$user['name'], time() + 3600 * 24 * 365, "/money_sewer");
header("Location: /money_sewer");


mysqli_close($mysql); 
?>