<?php

function pickingNumbers($a) {
    $counts = [];
    $diff = [0,1];
    foreach($a as $number) {
        $founds = [];
        foreach($a as $number2) {
            if (in_array($number - $number2, $diff)) {
                $founds[] = $number2;
            }
        }
        $counts[] = count($founds);
    }
    return max($counts);
}