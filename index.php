<?php

// Task №1 //

$name = 'Сергей';
$age = '27';

print "Меня зовут: $name <br>\n";
print "Мне $age лет <br>\n";
print "\"!|\\/'\"\\<br>\n";

// Task №2 //

$allDrawings = 80;
$feltPenDrawings = 23;
$pencilDrawings = 40;
$paintDrawings = $allDrawings - $feltPenDrawings - $pencilDrawings;
print $paintDrawings."<br>\n";

// Task №3 //

define("CONSTANT", 0);
if (defined("CONSTANT") == true) {
    print CONSTANT."<br>\n";
}
CONSTANT = 1;

// Task №4 //

$age = rand(1, 120);
if (($age > 17)&&($age < 66)) {
    print "Вам ещё работать и работать <br>\n";
} elseif ($age > 65) {
    print "Вам пора на пенсию <br>\n";
} elseif ($age < 18) {
    print "Вам ещё рано работать <br>\n";
} else {
    print "Неизвестный возраст <br>\n";
}

// Task №5 //

$day = rand(1, 7);
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        print "Это рабочий день <br>\n";
        break;
    case 6:
    case 7:
        print "Это выходной день <br>\n";
        break;
    default:
        print "Неизвестный день <br>\n";
        break;
}
