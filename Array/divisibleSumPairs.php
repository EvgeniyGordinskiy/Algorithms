<?php

function divisibleSumPairs($n, $k, $ar) {
    $pairs = 0;
    foreach(range(0, $n -1) as $step) {
        foreach(array_slice($ar, $step + 1) as $number) {
            if (($ar[$step] + $number) % $k === 0) {
                $pairs++;
            }
        }
    }
    return $pairs;
}