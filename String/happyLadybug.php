<?php

function happyLadybugs($b) {
    $bugs = [];
    $withPairs = [];
    for($i = 0; $i < strlen($b); $i++) {
        if ($b[$i] !== '_') {
            if (isset($b[$i+1]) && $b[$i] === $b[$i+1] && !in_array($b[$i], $withPairs)){
                $withPairs[] = $b[$i];
        }
            if (!isset($bugs[$b[$i]])) {
                $bugs[$b[$i]] = 0;
            }
            $bugs[$b[$i]]++;
        }
    }
    asort($bugs);
    if (reset($bugs) == 1 ||
        (substr_count($b, '_') === 0 &&
            count($bugs) !== count($withPairs))) {
        return 'NO';
    }

    return 'YES';
}