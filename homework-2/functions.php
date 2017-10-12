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
function task2($array, $operation)
{
    if (!is_array($array)) {
        echo "Введено некорректное значение вместо массива с числами.";
        return null;
    }

    if (count($array) < 2) {
        echo "Количество чисел в массиве должно быть не менее двух.";
        return null;
    }

    foreach ($array as $num) {
        $typeofValue = gettype($num);
        if ($typeofValue !== "integer" && $typeofValue !== "double") {
            echo "Массив должен содержать только числа.";
            return null;
        }
    }

    switch ($operation) {
        case "+":
            $result = 0;
            foreach ($array as $num) {
                $result += $num;
            }
            echo $result;
            break;
        case "-":
            $result = 0;
            foreach ($array as $num) {
                $result -= $num;
            }
            echo $result;
            break;
        case "*":
            $result = 1;
            foreach ($array as $num) {
                $result *= $num;
            }
            echo $result;
            break;
        case "/":
            $result = 1;
            foreach ($array as $num) {
                $result /= $num;
            }
            echo $result;
            break;
        default:
            echo "Введён некорректный знак арифметического действия. Введите одих из этих знаков: +, -, * или /";
            break;
    }
}
