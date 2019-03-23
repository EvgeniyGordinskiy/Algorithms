<?php

class PossibleSquaresInTheMatrix
{
    public $squares = [];
    public $cellsByParent = [];

    public function __construct(Array $arg)
    {
        for ($y = 0; $y < count($arg); $y++) {
            for ($i = 0; $i < count($arg[$y]); $i++) {
                if ($arg[$y][$i] === 1) {
                    $row = $i;
                    $heights = [];
                    $sq = [];
                    while (isset($arg[$y][$row]) && $arg[$y][$row] === 1) {
                        $height = 0;
                        $column = $y;
                        while (isset($arg[$column][$row]) && $arg[$column][$row] === 1) {
                            $height++;
                            $column++;
                        }
                        $heights[] = $height;
                        if ($heights && count($heights) >= min($heights) && !in_array(1, $heights)) {
                            $sq[] = count($heights);
                            $heights = [];
                        }
                        $row++;
                    }
                    if ($sq) {
                        $this->squares["$y$i"] = max($sq);
                    }
                }
            }
        }
    }
}