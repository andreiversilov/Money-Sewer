<?php 

if (!isset($_SESSION)) {
  session_start();
}
require_once "../functions.php";
register_shutdown_function(function(){
  if (error_get_last()) {
    var_export(error_get_last());
  }
});

$description = filter_var(trim($_POST['description']),
 FILTER_SANITIZE_STRING);

$amount = abs(floatval(filter_var(trim($_POST['amount']),
 FILTER_SANITIZE_NUMBER_INT)));
 
$currency = filter_var(trim($_POST['currency']),
 FILTER_SANITIZE_STRING);

$category = filter_var(trim($_POST['category']),
 FILTER_SANITIZE_STRING);

$type = filter_var(trim($_POST['type']),
 FILTER_SANITIZE_STRING);



 if ($amount > 1000000000000000000){
  $_SESSION['msg'] = "It can be more than Quintillion";
  header("Location: /money_sewer/?action=add_new");
  exit();
 }

 if(!validate_data($description,0,255,"description") ||
 !validate_data($currency,0, 30, "currency")) {
   header("Location: /money_sewer/?action=add_new");
  exit();
 }


 if ((strlen($description)) > 255) {
   header("Location: /money_sewer/?action=add_new");
  $_SESSION['msg'] = "Too long description, please use no more then 255 characters";
  exit();
 } 

$mysql = connection('transactions');
$login = $_COOKIE['user'];
$query = "INSERT INTO $login (description,сurrency,amount,type,category) 
VALUES('$description','$currency','$amount','$type','$category')";

$send = mysqli_query($mysql,$query);

if (!$send){
  die("Something went wrong".mysqli_error($mysql));
}

mysqli_close($mysql);

$_SESSION['msg'] = ("Transaction was added succesfully");
header("Locaction: /");
exit();

?>