<?php require('functions.php');

echo('Задание #1 <br>');
task1(['один', 'два', 'три', 'четыре', 'пять']);
echo(task1(['один', 'два', 'три', 'четыре', 'пять'], true));

echo "<br>";

echo('Задание #2 <br>');
task2([1, 2, 3, 4, 5], "+");

echo "<br>";

echo('Задание #3 <br>');
task3("+", 2, 4, 6, 8);

echo "<br>";
