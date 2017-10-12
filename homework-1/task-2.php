<?php

// Task №2 //

$allDrawings = 80;
$feltPenDrawings = 23;
$pencilDrawings = 40;
$paintDrawings = $allDrawings - $feltPenDrawings - $pencilDrawings;

print "На школьной выставке $allDrawings рисунков. 
        Из них $pencilDrawings выполнены карандашами, $feltPenDrawings фломастерами, 
        остальные красками. Сколько рисунков выполнены красками? <br>\n";
print "Количество рисунков выполненных красками = 
        $paintDrawings";
