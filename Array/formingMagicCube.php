<?php

function formingMagicSquare($s, $cost = 0) {
    $allPossible = [
        [[8, 1, 6], [3, 5, 7], [4, 9, 2]],
        [[6, 1, 8], [7, 5, 3], [2, 9, 4]],
        [[4, 9, 2], [3, 5, 7], [8, 1, 6]],
        [[2, 9, 4], [7, 5, 3], [6, 1, 8]],
        [[8, 3, 4], [1, 5, 9], [6, 7, 2]],
        [[4, 3, 8], [9, 5, 1], [2, 7, 6]],
        [[6, 7, 2], [1, 5, 9], [8, 3, 4]],
        [[2, 7, 6], [9, 5, 1], [4, 3, 8]],
    ];
    $costs = [];
    foreach ($allPossible as $item) {
        $cost = [];
        foreach($s as $key => $row) {
            $cost[] = get_diff($row, $item[$key]);
        }
        $costs[] = array_sum($cost);
    }
    return min($costs);
}

function get_diff($array1, $array2) {
    $cost = 0;
    for($i = 0; $i < 3; $i++) {
        $cost += abs($array1[$i] - $array2[$i]);
    }
    return $cost;
}