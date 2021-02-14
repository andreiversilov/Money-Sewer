<?php

  function render($path,$param = array())
  {
    extract($param);

    if(!include($path.".php"))
    {
      exit("Нет такого шаблона");
    }

    return $path;
  }

  function validate_data($data, $min, $max, $name) {
    if ($data == NULL) {
      $_SESSION['msg'] .= "Please, enter $name $min-$max characters long <br>";
      return false;
    }
    if (mb_strlen($data) < $min || mb_strlen($data) > $max) {
      $_SESSION['msg'] .= "Please, enter $name $min-$max characters long <br>";
      return false;
    }

    else 
      return true;
  }

   function validate_email($data) {
    if ($data == NULL) {
      $_SESSION['msg'] .= "Please, enter e-mail <br>";
      return false;
    }
    elseif (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['msg'] .= "Wrong e-mail, $data";
      return false;
    }
    else {
      return true;
    }
  }

  function create_transactions_table($login){
  $mysql = connection('transactions'); 

    $query = "CREATE TABLE $login
     (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      сurrency VARCHAR(30) NOT NULL,
      value INT(20) NOT NULL,
      type VARCHAR(30) NOT NULL,
      category VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

    

     $income = mysqli_query($mysql, $query);

    if(!$income){
        die("Query 'income' has error");
    }
   mysqli_close($mysql);
}

  function connection($name){
    $mysql = new mysqli('localhost','root','','transactions');

  if (!$mysql){
    die("Connection failed: ".mysqli_connect_error());
  } 
  return $mysql;
  }
?>