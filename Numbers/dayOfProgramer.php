<?php

function dayOfProgrammer($year) {
    $year = intval($year);
    $dayNumber = 0;
    $monthes = [
        '01' => 31,
        '02' => 28,
        '03' => 31,
        '04' => 30,
        '05' => 31,
        '06' => 30,
        '07' => 31,
        '08' => 31,
        '09' => 31
    ];
    if ($year === 1918) {
        $monthes['02'] = 15;
    } else if ($year <= 1917) {
        if ($year % 4 === 0) {
            $monthes['02'] = 29;
        }
    } else {
        if ($year % 4 === 0 && $year % 100 !== 0 || $year % 400 === 0) {
            $monthes['02'] = 29;
        }
    }
    foreach ($monthes as $month => $days) {
        $diff = 256 - $dayNumber;
        if ($diff < 30) {
            return "{$diff}.$month.$year";
        }
        $dayNumber += $days;
    }
}