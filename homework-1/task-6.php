<?php

// Task №6 //

$bmw = array(
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => '2015'
);

$toyota = array(
    'model' => 'Corolla',
    'speed' => 240,
    'doors' => 4,
    'year' => '2016'
);

$opel = array(
    'model' => 'Astra',
    'speed' => 210,
    'doors' => 3,
    'year' => '2014'
);

$cars['bmw'] = $bmw;
$cars['toyota'] = $toyota;
$cars['opel'] = $opel;

foreach ($cars as $car => $item) {
    echo "CAR $car<br>\n";
    foreach ($item as $key => $value) {
        echo $value.'&nbsp';
    }
    echo "<br>\n<br>\n";
}
