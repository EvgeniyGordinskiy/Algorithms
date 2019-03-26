<?php
function fibo($int)
{
    if ($int === 0 || $int === 1) {
        return $int;
    }
    return  fibo($int - 1) + fibo($int - 2);
}