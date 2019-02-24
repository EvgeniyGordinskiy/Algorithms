<?php

function migratoryBirds($arr) {
    $v = array_count_values($arr);
    $d = [];
    $d['frq'] = array_values($v);
    $d['ids'] = array_keys($v);
    array_multisort($d['frq'], SORT_DESC, SORT_NUMERIC, $d['ids'], SORT_ASC, SORT_NUMERIC);
    return $d['ids'][0];
}