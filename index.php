<?php
if(!isset($_SESSION)){
    session_start();
}

 require_once "configs.php";
 require_once "functions.php";
$action = ($_GET['action']);

require_once TEMPLATE."main.tpl.php";

if(file_exists(ACTIONS.$action.".php"))
{
  include ACTIONS.$action.".php";
}
else
{
  include ACTIONS."main.php"; 
}
?>