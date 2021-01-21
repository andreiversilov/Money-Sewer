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
    if (mb_strlen($data) < $min || mb_strlen($data) > $max) {
      echo "Plaese, enter $name $min-$max characters long"; 
    exit();
    }
  }
?>