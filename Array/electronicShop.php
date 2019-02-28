<?php

function getMoneySpent($keyboards, $drives, $b) {
    rsort($keyboards);
    rsort($drives);
    if (end($keyboards) > $b || end($drives) > $b) {
        return -1;
    }
    reset($keyboards);
    reset($drives);
    $costs = [];
    foreach ($keyboards as $item) {
        $costs[] = calculate_cost($drives, $item, $b);
    }
    foreach ($drives as $item1) {
        $costs[] = calculate_cost($keyboards, $item1, $b);
    }
    $cost = max($costs);
    return !$cost || $cost > $b ? -1 : $cost;

}

function calculate_cost($a, $item, $b) {
    $cost = 0;
    foreach($a as $price) {
        $c = $price + $item;
        if ($c <= $b) {
            $cost = $c;
            break;
        }
    }
    return $cost;
}