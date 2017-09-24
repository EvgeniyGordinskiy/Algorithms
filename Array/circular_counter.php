<?php

/**
 * Delete every n item from array (circular_counter).
 * @param $a
 * @param $n
 * @return array
 */
function everyN (&$a, $n) {
    $result = [];
    $i = 1;
    while (count($a) != 0) {
        foreach ($a as $key => $value) {
            if ($i == $n) {
                $i = 1;
                $result[] = $a[$key];
                unset($a[$key]);
            } else if(count($a) < $n && $i % count($a) == 0) {
                $i++;
            } else if(current($a) == count($a)) {
                $i = 1;
            } else {
                $i++;
            }
        }
    }
    return $result;
}