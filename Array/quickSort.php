<?php

/*
 * The way the array is sorted
 */


qsort($array);


/**
 *  Determining the maximum and minimum values
 *
 * @param $array
 */
function qsort(&$array) {
    $left = 0;
    $right = count($array) - 1;
    mySort($array, $left, $right);
}

/**
 * Array sorting
 *
 * @param $array
 * @param $left
 * @param $right
 */
function mySort(&$array, $left, $right) {
    $l = $left;
    $r = $right;
    $center = $array[(int)($left + $right) / 2];
    do {
        while ($array[$r] > $center) {
            $r--;
        }
        while ($array[$l] < $center) {
            $l++;
        }
        if ($l <= $r) {
            list($array[$r], $array[$l]) = array($array[$l], $array[$r]);
            $l++;
            $r--;
        }
    } while ($l <= $r);
        if ($r > $left) {
            mySort($array, $left, $r);
        }
        if ($l < $right) {
            mySort($array, $l, $right);
        }
}

