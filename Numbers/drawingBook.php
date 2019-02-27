<?php

function pageCount($n, $p) {
    return min([get_papers($n, $p), get_papers($n, $p, false)]);
}

function get_papers($n, $p, $frontStart = true)
{
    $numberPaper = !$frontStart ? ($n - 1)  % 2 ? $n : $n - 1 : 1;
    $leaves = 0;
    while($leaves < $n) {
        if ($frontStart && $numberPaper >= $p || !$frontStart && $numberPaper <= $p) {
            break;
        }
        if ($frontStart) {
            $numberPaper = increase_paper_number($numberPaper, 2);
        } else {
            $numberPaper = increase_paper_number($numberPaper, 2, false);
        }
        $leaves++;
    }
    return $leaves;
}

function increase_paper_number(int $numberPaper, int $increasment, bool $increase = true)
{
    foreach(range(1, $increasment) as $page)
    {
        if ($increase) {
            $numberPaper++;
        } else {
            $numberPaper--;
        }
    }
    return $numberPaper;
}