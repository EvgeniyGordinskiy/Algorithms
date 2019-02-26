<?php

function bonAppetit($bill, $k, $b) {
    $products = $bill;
    unset($products[$k]);
    $half = array_sum($products) / 2;
    if ($rest = $b - $half) {
        echo $rest;
    } else {
        echo 'Bon Appetit';
    }
}