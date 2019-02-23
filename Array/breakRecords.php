<?php

function breakingRecords($scores) {
    $min = $scores[0];
    $max = $scores[0];
    $outp = [];
    $outp[0] = [];
    $outp[1] = [];
    foreach($scores as $score) {
        if ($score > $max) {
            $max = $score;
            $outp[0][] = $score;
        } else if ($score < $min) {
            $min = $score;
            $outp[1][] = $score;
        }
    }
    return [count($outp[0]), count($outp[1])];
}