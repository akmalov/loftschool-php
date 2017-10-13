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
function task3()
{
    $operation = func_get_arg(0);
    if ($operation !== "+" && $operation !== "-" && $operation !== "*" && $operation !== "/") {
        echo "Первым аргументом функции должен быть знак арифметического действия";
        return null;
    }
    $arguments = func_get_args();
    $array = array_splice($arguments, 1);
    $num = task2($array, $operation);
    return $num;
}

function task4($number1, $number2)
{
    $typeofNumber1 = gettype($number1);
    $typeofNumber2 = gettype($number2);
    if ($typeofNumber1 !== "integer" || $typeofNumber2 !== "integer") {
        echo "Введите два целых числа.";
        return null;
    } elseif ($number1 <= 0 || $number2 <= 0) {
        echo "Введите два целых числа больше нуля.";
        return null;
    }

    echo "<table><tr>";

    for ($i = 1; $i <= $number1; $i++) {
        for ($j = 1; $j <= $number2; $j++) {
            echo "<td>" . '&nbsp' . ($i * $j) . '&nbsp' . "</td>";
        }
        if ($i != $number1) {
            echo "</tr><tr>";
        }
    }

    echo "</tr></table>";
}
function task5($string)
{
    function utf8_strRev($str)
    {
        preg_match_all('/./us', $str, $ar);
        return join('', array_reverse($ar[0]));
    }

    function palindrome($value)
    {
        if ($value) {
            return "Введённая строка палиндром.";
        } else {
            return "Введённая строка не палиндром.";
        }
    }

    $string = trim($string);
    $string = mb_strtolower($string);
    $string = str_replace(" ", "", $string);
    $stringReverse = utf8_strRev($string);

    if ($stringReverse == $string) {
        echo palindrome(true);
    } else {
        echo palindrome(false);
    }
}
function task6()
{
    echo date("j.n.Y H:i");
    echo "<br>";
    echo strtotime("24.02.2016 00:00:00");
}
function task7($string1, $string2)
{
    echo str_replace("К", "", $string1);
    echo "<br>";
    echo str_replace("Две", "Три", $string2);
}
function smile()
{
    echo "<pre>
              OOOOOOOOOOO
         OOOOOOOOOOOOOOOOOOO
      OOOOOO  OOOOOOOOO  OOOOOO
    OOOOOO      OOOOO      OOOOOO
  OOOOOOOO  #   OOOOO  #   OOOOOOOO
 OOOOOOOOOO    OOOOOOO    OOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOO  OOOOOOOOOOOOOOOOOOOOOOOOO  OOOO
 OOOO  OOOOOOOOOOOOOOOOOOOOOOO  OOOO
  OOOO   OOOOOOOOOOOOOOOOOOOO  OOOO
    OOOOO   OOOOOOOOOOOOOOO   OOOO
      OOOOOO   OOOOOOOOO   OOOOOO
         OOOOOO         OOOOOO
             OOOOOOOOOOOO
              </pre>";
}
function task8($string)
{
    if (preg_match("/[:][)]/", $string, $matches)) {
        smile();
    } else {
        preg_match("/packets:[0-9]+/", $string, $matches);
        $pack = explode(":", $matches[0])[1];
        if ($pack > 1000) {
            echo "Сеть есть.";
        }
    }
}
