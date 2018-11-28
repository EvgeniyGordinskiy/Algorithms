<?php

function miniMaxSum($arr) {
    sort($arr);
    $min = array_slice($arr, 0, count($arr) - 1);
    $max = array_slice($arr, 1);
    echo array_sum($min).' '. array_sum($max);
}