<?php

function sockMerchant($n, $ar) {
    $pairs = 0;
    foreach(array_count_values($ar) as $items) {
        $pairs += floor($items / 2);
    }
    return $pairs;
}