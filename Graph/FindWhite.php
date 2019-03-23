<?php


/**
 * Class FindWhite
 * Find and union all white cells (value = 1)
 */
class FindWhite
{
    public $cells = [];
    public $cellsByParent = [];

    public function __construct(Array $arg)
    {
        for ($y = 0; $y < count($arg); $y++) {
            for ($i = 0; $i < count($arg[$y]); $i++) {
                if ($arg[$y][$i] === 1) {
                    $parent = "$y$i";
                    if (isset($this->cells[($y - 1) . $i])) {
                        $parent = $this->cells[($y - 1) . $i];
                        $k = $i;
                        if (isset($this->cells[$y . ($k - 1)]) && $this->cells[$y . ($k - 1)] !== $parent) {
                            $leftParent = $this->cells[$y . ($k - 1)];
                            if (count($this->cellsByParent[$leftParent]) > count($this->cellsByParent[$parent])) {
                                $this->cells[$parent] = $leftParent;
                                if ($this->cellsByParent[$parent] && $this->cellsByParent[$leftParent]) {
                                    $this->cellsByParent[$leftParent] = array_merge($this->cellsByParent[$leftParent], $this->cellsByParent[$parent]);
                                    unset($this->cellsByParent[$parent]);
                                }
                            } else if (count($this->cellsByParent[$leftParent]) <= count($this->cellsByParent[$parent])) {
                                $this->cells[$leftParent] = $parent;
                                if ($this->cellsByParent[$parent] && $this->cellsByParent[$leftParent]) {
                                    $this->cellsByParent[$parent] = array_merge($this->cellsByParent[$parent], $this->cellsByParent[$leftParent]);
                                    unset($this->cellsByParent[$leftParent]);
                                }
                            }
                        }
                    } else if (isset($this->cells[$y . ($i - 1)])) {
                        $parent = $this->cells[$y . ($i - 1)];
                    }
                    $this->cells["$y$i"] = $parent;
                    if (isset($this->cells[$this->cells[$parent]])) {
                        $parent = $this->cells[$this->cells[$parent]];
                    }
                    $this->cellsByParent[$parent][] = "$y$i";
                }
            }
        }
    }
}

$c = new FindWhite([
    [1,1,1,1,1,1,1,1,1,1],
    [1,1,1,0,0,1,1,1,0,0],
    [1,1,1,0,0,1,1,1,0,0],
    [1,0,1,0,0,1,0,1,0,0],
    [1,1,0,1,1,1,1,0,1,1],
    [1,1,1,1,1,1,1,1,1,1],
    [1,1,1,0,0,1,1,1,0,0],
    [1,1,1,0,0,1,1,1,0,0],
    [1,0,1,0,0,1,0,1,0,0],
    [1,1,0,1,1,1,1,0,1,1]]);
