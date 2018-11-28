<?php

function timeConversion($s) {
    $s = trim($s);
    $hours = intval(substr($s,0,2));
    $timeDay = substr($s, -2);
    $s = str_replace($timeDay, '', $s);
    if ($timeDay === 'PM' && $hours !== 12) {
        $hours += 12;
    }
    if ($timeDay === 'AM' && $hours === 12) {
        $hours = '00';
    }
    $hours = $hours !== '00' && $hours < 10? '0'.$hours : $hours;
    return $hours.substr($s,2);
}