<?php

function countingValleys($n, $s) {
    $valleys = 0;
    $attitude = 0;
    $s = str_split($s);
    foreach($s as $key => $char) {
        switch($char) {
            case 'U': {
                $attitude++;
                if (($attitude - 1) < 0 && $attitude >= 0) {
                    $valleys++;
                }
                break;
            }
            case 'D': {
                $attitude--;
                break;
            }
        }
    }
    return $valleys;
}