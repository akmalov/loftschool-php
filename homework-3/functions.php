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
