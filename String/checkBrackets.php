<?php

/**
* Determines whether the brackets
* @param string $s
* @return bool
*/
function checkBrackets(string $s) : bool
{
preg_match_all('/[\(\)\[\]\{\}]/', $s, $matches);
$braces = $matches[0];

$opening = ['{', '[', '('];
$braces_map = ['{' => '}', '[' => ']', '(' => ')'];
$open_braces = [];

foreach ($braces as $brace) {

    if (in_array($brace, $opening)) {
    $open_braces[] = $brace;
    continue;
    }

    if (empty($open_braces)) {
        return FALSE;
    }

    if ($braces_map[array_pop($open_braces)] !== $brace) {
        return FALSE;
    }
}

return empty($open_braces);
}