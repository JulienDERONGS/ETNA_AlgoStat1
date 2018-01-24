<?php

class             Sort
{
  private         $str;
  private         $regex_int_float_negornot;

  function        __construct($str)
  {
    $this->regex_int_float_negornot = "/(-?\d+(\.|\,)?\d+)|(-?\d+)/";
    $this->str = $str;
  }

  function        __destruct()
  {
    unset($this->str);
    unset($this->regex_int_float_negornot);
  }

  public function get_clean_data()
  {
                  $data = array();
                  $clean_data = array();

    // Clean raw data
    preg_match_all($this->regex_int_float_negornot, $this->str, $matches);

    // Add cleaned data
    if (empty($matches))
    {
      return (NULL);
    }
    foreach ($matches as $key => $value)
    {
      array_push($data, $value);
    }
    $clean_data = str_replace(",", ".", $data[0]);
    //////////DEBUG*
    var_dump($clean_data);
    //////////DEBUG/
    return ($clean_data);
  }
}

?>