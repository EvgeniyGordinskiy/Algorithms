<?php

function catAndMouse($x, $y, $z) {
    $min = $x < $y ? ['A', $x] : ['B', $y];
    $max = $x > $y ? ['A', $x] : ['B', $y];
    if ($min[1] === $max[1]) {
        return 'Mouse C';
    } else if ($z <= $min[1]) {
        return "Cat {$min[0]}";
    } else if ($z >= $max[1]) {
        return "Cat {$max[0]}";
    } else {
        $A = abs($z - $min[1]);
        $B = abs($z - $max[1]);
        if ($A > $B) {
            return 'Cat ' . $max[0];
        } else if ($A < $B) {
            return 'Cat ' . $min[0];
        } else {
            return 'Mouse C';
        }
    }
}