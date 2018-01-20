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

echo "Hello there, I'm going to sort the following array using a selection sort !!\n";
echo "array = [";
for ($i = 0; $i < count($array) - 1; $i++) {
    echo $array[$i];
    echo ", ";
}
echo $array[count($array) - 1], "]\n";

$index = -1;

for ($i = 0; $i < count($array); $i++) {
    $min = $array[$i];
    for ($j = $i; $j < count($array); $j++) {
        if ($array[$j] < $min) {
            $min = $array[$j];
            $index = $j;
        }
    }
    if ($index != -1) {
        $tmp = $array[$i];
        $array[$i] = $array[$index];
        $array[$index] = $tmp;
    }
    $index = -1;
}


echo "Here you go, I'm done sorting this !\n";
echo "array = [";
for ($e = 0; $e < count($array) - 1; $e++) {
    echo $array[$e];
    echo ", ";
}
echo $array[count($array) - 1], "]\n";

?>