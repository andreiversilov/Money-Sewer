<?php
$mysql = new mysqli('localhost','root','','sewer');

if (!$mysql){
    die("Connection failed: " . mysqli_connect_error());
} 
?>