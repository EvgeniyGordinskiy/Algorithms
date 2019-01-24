<?php

function evenCmp($input)
{
    return !($input & 1);
}

function divFind($num)
{
    $result = [1];
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            if ($i === $num / $i) {
                $result[] = $i;
            } else {
                $result[] = $i;
                $result[] = $num /$i;
            }
        }
    }

    if (array_sum($result) > $num && array_sum(array_filter($result, "evenCmp")) !== $num) {
        return $num;
    }

    return null;
}
$result = [];
foreach(range(1, 1000) as $num) {
    if ($res = divFind($num)) {
        $result[] = $res;
    }
}