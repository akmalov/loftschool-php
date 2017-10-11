<?php
function task1($array, $string = false)
{
    if ($string == true) {
        return (implode(" ", $array));
    }
    foreach ($array as $value) {
        echo "<p>$value</p>";
    }
}
