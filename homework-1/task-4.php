<?php

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
