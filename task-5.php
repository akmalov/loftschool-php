<?php

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
