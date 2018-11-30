<?php

function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges) {
    $oranges = count(filter_fruits($oranges, $s, $t, $b));
    $apples = count(filter_fruits($apples, $s, $t, $a));
    echo $apples . PHP_EOL;
    echo $oranges;

}

function filter_fruits($array, $leftPointHome, $rightPointHome, $positionTree) {
    return array_filter($array, function($item) use($rightPointHome, $leftPointHome, $positionTree) {
        $distance = $item + $positionTree;
        if ($rightPointHome  >= $distance && $distance >= $leftPointHome) {
            return true;
        }
        return false;
    });
}