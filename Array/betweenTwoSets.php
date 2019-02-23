<?php

function getTotalX($a, $b) {
    $minV = min($b);
    $needles = [];
    for ($i = 1; $i <= $minV; $i++) {
        if (check_factors($b, $i, true) === 0) {
            if (check_factors($a, $i) === 0) {
                $needles[] = $i;
            }
        }
    }
    return count($needles);
}

function check_factors($array, $number, $reverse = false)
{
    return  array_reduce($array, function($c, $n) use ($number, $reverse) {
        if (!$reverse) {
            $c += $number % $n;
        } else {
            $c += $n % $number;
        }
        return $c;
    }, 0);
}