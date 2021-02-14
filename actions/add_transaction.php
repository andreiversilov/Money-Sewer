<?php 

if (!isset($_SESSION)) {
  session_start();
}

$description = filter_var(trim($_POST['description']),
 FILTER_SANITIZE_STRING);

$amount = filter_var(trim($_POST['amount']),
 FILTER_SANITIZE_STRING);
 
$currency = filter_var(trim($_POST['currency']),
 FILTER_SANITIZE_STRING);

$category = filter_var(trim($_POST['category']),
 FILTER_SANITIZE_STRING);

$type = filter_var(trim($_POST['type']),
 FILTER_SANITIZE_STRING);
echo "type is".$type."<br>";
echo $amount."is amount<br>";
echo $currency."is currecny";
// $description = 
// $amount = 
// $currency = 
// $category =
// $type = 

?>