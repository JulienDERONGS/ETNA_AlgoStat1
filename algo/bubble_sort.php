<?php
$array = array(
    0 => 9,
    1 => 18,
    2 => 7,
    3 => 6,
    4 => -5,
    5 => 4,
    6 => 33,
    7 => 12,
    8 => 100,
    9 => 0,
);

echo "Hello there, I'm going to sort the following array using a bubble_sort!!\n";
echo "array = [";
for ($i = 0; $i < count($array) - 1; $i++) {
    echo $array[$i];
    echo ", ";
}
echo $array[count($array) - 1], "]\n";

for ($i = 1; $i < count($array); $i++) {
    for ($j = 0; $j < count($array) - $i; $j++) {
        if ($array[$j] > $array[$j + 1]) {
            $tmp = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $tmp;
        }
    }
}


echo "Here you go, I'm done sorting this !\n";
echo "array = [";
for ($e = 0; $e < count($array) - 1; $e++) {
    echo $array[$e];
    echo ", ";
}
echo $array[count($array) - 1], "]\n";

?>