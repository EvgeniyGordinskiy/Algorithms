<?php
/**
 * Inverts the array keys.
 * @param $a
 * @return array
 */
function arrayReverseKeys(array $a) :array
{
    $b = $a;
    $c = array();
    end($b);
    foreach ($a as $v) {
        $c[key($b)] = $v;
        prev($b);
    }
    return $c;
}
