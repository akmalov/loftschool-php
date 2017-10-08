<?php

// Task 8 //

$str = "1 2 3 4 5 6";
print "<p>$str<p>";

$array = explode(' ', $str);
print '<pre>' . print_r($array, true) . '</pre>';

$arrayLength = count($array);
while ($arrayLength) {
    $recursiveArray[] = $array[$arrayLength - 1];
    $arrayLength--;
}
$result = implode(' ; ', $recursiveArray);
echo $result;
