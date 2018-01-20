<?php

class Sort
{
  private $data = array();
  private $iter;
  private $regex_nb_or_float;

  function __construct($data, $iter)
  {
    $this->$regex_int_float_negornot = "/-?\d+(\.|\,)?\d+/g";
    if ($iter > 0)
    {
      $this->$iter = $iter;
    }
    else
    {
      $this->$iter = 0;
    }
  }

  function __destruct()
  {
    unset($this->$data);
    unset($this->$iter);
  }

  function clean_and_add_data($data)
  {
    if (empty($new_cleaned_data))
    {
      return (NULL);
    }
    foreach ($new_cleaned_data as $key => $value)
    {
      array_push($this->$data);
    }
  }
}

?>
