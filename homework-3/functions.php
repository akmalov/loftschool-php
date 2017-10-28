<?php

function task1()
{
    $data = json_decode(json_encode(simplexml_load_file('data.xml')), true);
    echo "<table width=60% border=\"1px solid black\" cellspacing=\"0\" cellpadding=\"0\">";
    output($data);
    echo "</table>";
}

function output($data, $parent = '')
{
    if (is_array($data)) {
        if (count($data) == 1 && $parent != '@attributes') {
            echo "<tr><td>$parent</td><td></td></tr>";
            echo "<tr><td></td><td></td></tr>";
        }
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                echo "<tr><td>$parent</td>";
                echo "<td>";
                echo "<tr><td></td><td></td></tr>";
                output($value, $parent);
                echo "</td></tr>";
            } else {
                output($value, $key);
            }
        }
    } else {
        echo "<tr><td>$parent</td><td>$data</td></tr>";
    }
}

function task2()
{
    $data = [
        'brand' => 'BMW',
        'model' => 'X5',
        'characteristics' => [
            'speed' => '235',
            'acceleration' => '6.5',
            'consumption' => 8.5
        ]
    ];
    $jsonSettings= JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE;
    $jsonString = json_encode($data, $jsonSettings);
    file_put_contents('output.json', $jsonString);
    $outputOriginal = json_decode(file_get_contents('output.json'), true);
    randomlyChangeArray($outputOriginal);
    file_put_contents('output2.json', json_encode($outputOriginal, $jsonSettings));
    $outputCompare = json_decode(file_get_contents('output.json'), true);
    $output2Compare = json_decode(file_get_contents('output2.json'), true);
    $differences = [];
    if (compareArrays($outputCompare, $output2Compare, $differences)) {
        echo '<h3>Отличия:</h3> <br>';
        printDifferences($differences);
    } else {
        echo 'Изменений нет<br>';
    }
}

function printDifferences($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre> <br>';
}

function randomlyChangeArray(&$array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            randomlyChangeArray($array[$key]);
        } elseif (rand(0, 5) === 0) {
            $array[$key] = '666';
        }
    }
}

function compareArrays($array1, $array2, &$differences)
{
    $result = 0;
    foreach ($array1 as $key => $value) {
        if (is_array($value)) {
            if (compareArrays($array1[$key], $array2[$key], $differences[$key])) {
                $result = 1;
            } else {
                unset($differences[$key]);
            }
        } elseif ($array1[$key] !== $array2[$key]) {
            $differences[$key] = $array1[$key] . ' ====>>>> ' . $array2[$key];
            $result = 1;
        }
    }
    return $result;
}

function task3()
{
    $table = [];
    $rows = 5;
    while ($rows--) {
        $row = [];
        $columns = 10;
        while ($columns--) {
            $row[] = rand(1, 100);
        }
        $table[] = $row;
        echo implode(', ', $row), '<br>';
    }
    $fileName = 'data.csv';
    $file = fopen($fileName, 'w');
    foreach ($table as $row) {
        fputcsv($file, $row);
    }
    fclose($file);
    echo "Данные сохранены в файле \"$fileName\"<br>";
    $file = fopen($fileName, 'r');
    $amount = 0;
    while ($row = fgetcsv($file)) {
        foreach ($row as $value) {
            if ($value % 2 === 0) {
                $amount += $value;
            }
        }
    }
    echo "Сумма чётных чисел: $amount<br>";
}

function task4()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curlExec = curl_exec($curl);
    curl_close($curl);
    preg_match_all('/"pageid":\d+|"title":".*?"/', $curlExec, $matches);
    foreach ($matches[0] as $item) {
        echo $item, '<br>';
    }
}
