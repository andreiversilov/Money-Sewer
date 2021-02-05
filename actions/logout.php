<?php 
setcookie('user',$user['name'], time() - 3600, "/money_sewer");
header("Location: /money_sewer")
?>