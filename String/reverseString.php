<?php
/**
 * Inverts line
 * @param string $s
 * @return string
 */
function reverseString (string $s) :string
{
    $b = "";
    for ($i = 0; $i < strlen($s); $i++) {
        $key = strlen($s) - 1 - $i;
        $b .= $s[$key];
    }
    return $b;
}