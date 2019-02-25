<?php

function magic_stick($input1, $input2, $input3)
{
    $scores = [];
    foreach($input2 as $length) {
        $scores[$length] = get_score(array_combine($input3, $input2), $length);
    }
    return min(array_values($scores));
}

function get_score($data, $target)
{
    $result = 0;
    while(count(array_unique(array_values($data))) !== 1) {
        foreach ($data as $cost => &$kLen) {
            if ($kLen > $target) {
                $kLen--;
                $result += $cost;
            } else if ($kLen < $target) {
                $kLen++;
                $result += $cost;
            }
        }
    }
    return $result;
}