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

echo('Задание #4 <br>');
task4(8, 8);

echo "<br>";

echo('Задание #5 <br>');
task5("Лена набила рожу мужу муж орал и банан ел");

echo "<br>";

echo('Задание #6 <br>');
task6();

echo "<br>";

echo('Задание #7 <br>');
task7("Карл у Клары украл Кораллы", "Две бутылки лимонада");

echo "<br>";

echo('Задание #8 <br>');
task8("RX packets:950381 errors:0 dropped:0 overruns:0 frame:0.");
echo "<br>";
task8("RX packets:950381 errors:0 dropped:0 overruns:0 frame:)0.");

echo "<br>";
