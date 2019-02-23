<?php
function kangaroo($x1, $v1, $x2, $v2) {
    return $x2 > $x1 && $v2 < $v1 && $v2 !== $v1 &&
        (($x2 - $x1) % ($v2- $v1)) === 0 ? 'YES' : 'NO';
}