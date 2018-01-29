<?php
// TODO: ALL JAVADOC
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

  function get_clean_data()
  {
    $data = array();
    $clean_data = array();
    $clean_data_floats = array();

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
    foreach ($clean_data as $key => $value)
    {
      array_push($clean_data_floats, floatval($value));
    }

    //////////DEBUG*
    var_dump($clean_data_floats);
    //////////DEBUG/
    return ($clean_data_floats);
  }

  function sort_by_type($type, $seq)
  {
    return ($this->$type($seq));
  }

  protected function insertion($seq)
  {
  	for ($i = 0; $i < count($seq); $i++)
    {
  		$value = $seq[$i];
  		$j = ($i - 1);
  		while ($j >= 0 && $seq[$j] > $value)
      {
  			$seq[$j + 1] = $seq[$j];
  			$j--;
  		}
  		$seq[$j + 1] = $value;
  	}
  return $seq;
  }

  protected function selection()
  {}

  protected function bubble()
  {}
}

?>
