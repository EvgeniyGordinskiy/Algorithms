<?php

function birthdayCakeCandles($ar) {
    sort($ar);
    $count = 0;
    for($i = count($ar) - 1; $i >= 0; $i-- ) {
        if (isset($ar[$i+1]) && $ar[$i] !== $ar[$i+1]) {
            break;
        }
        $count++;
    }
    return $count;
}