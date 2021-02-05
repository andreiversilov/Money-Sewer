<?php
 // ini_set('display_errors',1);
 // error_reporting(E_ALL);
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

   function validate_email($data, $min, $max, $name) {
    if ($data == NULL) {
      $_SESSION['msg'] .= "Please, enter $name $min-$max characters long <br>";
      return false;
    }
    if (mb_strlen($data) < $min || mb_strlen($data) > $max) {
      $_SESSION['msg'] .= "Please, enter $name $min-$max characters long <br>";
      return false;
    }
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['msg'] .= "Wrong e-mail";
      return false;
    }
    
    else 
      return true;
  }

?>