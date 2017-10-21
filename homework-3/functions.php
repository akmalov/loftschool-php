<?php

function task1()
{
    $data = json_decode(json_encode(simplexml_load_file('data.xml')), true);
    output($data);
}

function output($data, $parent = '')
{
    if (is_array($data)) {
        if (count($data) == 1 && $parent != '@attributes') {
            echo "$parent:<br>";
        }
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                echo "$parent:<br>";
                output($value, $parent);
            } else {
                output($value, $key);
            }
        }
    } else {
        echo "$parent: $data<br>";
    }
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
