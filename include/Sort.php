<?php
// TODO: ALL JAVADOC
class             Sort
{
  private         $str;
  private         $regex_int_float_negornot;
  private         $sort_time;
  private         $sort_cost;
  private         $sort_total_nb;
  private         $sorted_array;

  function __construct($str)
  {
    $this->regex_int_float_negornot = "/(-?\d+(\.|\,)?\d+)|(-?\d+)/";
    $this->str = htmlspecialchars($str);
    $sort_time = 0;
    $sort_cost = 0;
    $sort_total_nb = 0;
    $sorted_array = array();
  }

  function __destruct()
  {
    unset($this->str);
    unset($this->regex_int_float_negornot);
    unset($this->sort_time);
    unset($this->sort_cost);
    unset($this->sort_total_nb);
    unset($this->sorted_array);
  }

  function getSortTime()      {return ($this->sort_time);}
  function getSortCost()      {return ($this->sort_cost);}
  function getSortTotalNb()   {return ($this->sort_total_nb);}
  function getSortedArray()   {return ($this->sorted_array);}

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
    return ($clean_data_floats);
  }

  // Sorting functions pointer, should use form types as $type
  function sort_by_type($type, $seq)
  {
    return ($this->$type($seq));
  }

  protected function swap_array($array, $left, $right)
  {
  	$tmp = $array[$left];
    $array[$left] = $array[$right];
  	$array[$right] = $tmp;
  	return $array;
  }

  protected function insertion($seq)
  {
    $this->sort_time = microtime(true);
    $this->sort_cost = 0;

  	for ($i = 0; $i < count($seq); $i++)
    {
  		$value = $seq[$i];
  		$j = ($i - 1);
  		while ($j >= 0 && $seq[$j] > $value)
      {
  			$seq[$j + 1] = $seq[$j];
  			$j--;
        $this->sort_cost++;
  		}
  		$seq[$j + 1] = $value;
      $this->sort_cost++;
  	}
    $this->sort_time = microtime(true) - $this->sort_time;
    $this->sorted_array = $seq;
    $this->sort_total_nb = count($seq);
    return $this->getSortedArray();
  }

  protected function selection($seq)
  {
    $this->sort_time = microtime(true);
    $this->sort_cost = 0;

    for ($i = 0; $i < count($seq) - 1; $i++)
    {
    	$min = $i;
    	for ($j = $i + 1; $j < count($seq); $j++)
      {
    		if ($seq[$j] < $seq[$min])
        {
    			$min = $j;
    		}
        $this->sort_cost++;
    	}
      $seq = $this->swap_array($seq, $i, $min);
      $this->sort_cost++;
    }
    $this->sort_time = microtime(true) - $this->sort_time;
    $this->sorted_array = $seq;
    $this->sort_total_nb = count($seq);
    return $this->getSortedArray();
  }

  protected function bubble($seq)
  {
    $this->sort_time = microtime(true);
    $this->sort_cost = 0;

    $swapped = true;
    while ($swapped)
  	{
  		$swapped = false;
  		for ($i = 0, $seq_max = count($seq) - 1; $i < $seq_max; $i++)
  		{
  			if ($seq[$i] > $seq[$i + 1])
  			{
  				$seq = $this->swap_array($seq, $i, $i + 1);
  				$swapped = true;
  			}
        $this->sort_cost++;
  		}
      $this->sort_cost++;
  	}
    $this->sort_time = microtime(true) - $this->sort_time;
    $this->sorted_array = $seq;
    $this->sort_total_nb = count($seq);
    return $this->getSortedArray();
  }
}
?>
