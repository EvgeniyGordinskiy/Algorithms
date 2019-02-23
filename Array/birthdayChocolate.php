<?php

function birthday($s, $d, $m) {
    $decisions = 0;
    if ($m === 1 && in_array($d, $s)) {
        $decisions = 1;
    } else {
        for($i = 0; $i < count($s); $i++) {
            if ($d === sum_contiguous($s, $i, $m)) {
                $decisions++;
            }
        }
    }
    return $decisions;
}

function sum_contiguous($array, $index, $count)
{
    $sum = $array[$index];
    $found = 0;
    foreach(range(1, $count - 1) as $number) {
        $nIndex = $index - $number;
        if (isset($array[$nIndex])) {
            $sum += $array[$nIndex];
            $found++;
        }
    }
    return $found === $count -1 ? $sum : 0;
}