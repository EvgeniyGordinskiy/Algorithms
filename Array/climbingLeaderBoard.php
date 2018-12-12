<?php

function climbingLeaderboard($scores, $alice) {
    $ranks = [];
    $lastNumber = max($scores) + 1;
    $rank = 1;
    rsort(array_unique($scores));
    foreach($scores as $score) {
        if ($score < $lastNumber) {
            $ranks[$score] = $rank;
            $rank++;
        }
        $lastNumber = $score;
    }
    $aliceRanks = [];
    foreach ($alice as $alRank) {
        $aliceRanks[] = find_rank($ranks, $alRank);
    }
    return $aliceRanks;
}

function get_chunk($scores, $aliceScore) {
    if (count($scores) < 1000) return $scores;
    $low = 0;
    $high = count($scores) - 1;
    $originScores = $scores;
    while (count($scores) >= 1000 && $low > 0 && $high < count($scores)) {
        $mid = floor(($low + $high) / 2);
        // end($scores);
        if ($aliceScore < key($scores)) {
            $high = $mid -1;
            $scores = array_slice($scores, 0, $mid, true);
        }
        else {
            $low = $mid + 1;
            $scores = array_slice($scores, $mid, true);
        }
    }
    return $scores;
}

function find_rank(Array $ranks, $score) {
    $found = false;
    $result = 0;
    foreach(get_chunk($ranks, $score) as $number => $rank) {
        if ($number <= $score && !$found) {
            $result = $rank;
            $found = true;
        }
    }
    if (!$found) {
        $result = end($ranks) + 1;
    }
    return $result;
}