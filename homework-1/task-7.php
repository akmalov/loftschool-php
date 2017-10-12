<?php

// Task 7 //

print "<table><tr>";

for ($i = 1; $i < 11; $i++) {
    for ($j = 1; $j < 11; $j++) {
        if ($i % 2 == 0 && $j % 2 == 0) {
            print "<td>" . '(' . ($j * $i) . ')' . "</td>";
        } elseif ($i % 2 == 1 && $j % 2 == 1) {
            print "<td>" . '[' . ($j * $i) . ']' . "</td>";
        } else {
            print "<td>" . '&nbsp' . ($i * $j) . '&nbsp' . "</td>";
        }
    }
    if ($i != 10) {
        print "</tr><tr>";
    }
}

print "</tr></table>";
