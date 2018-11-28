<?php

function staircase($n) {
    if (is_int($n)) {
        for($i = 0; $i < $n; $i++) {
            $result = str_repeat(' ', $n-$i-1).str_repeat('#', $i+1).PHP_EOL;
            echo $result;
        }
    }
}