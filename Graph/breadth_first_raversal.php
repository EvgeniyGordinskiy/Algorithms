<?php

class Graph
{
    protected $graph = [];

    public function set_edge($line, $edge)
    {
        $this->graph[$line][] = $edge;
    }

    public function BFS($startEdge = 0)
    {
        $visited = [];
        foreach($this->graph as $line ) {
            foreach($line as $edge) {
                $visited[$edge] = false;
            }
        }
        $queue = [$startEdge];
        $visited[$startEdge] = true;
        while ($queue) {
            $s = array_pop($queue);
            echo "$s ";
            foreach($this->graph[$s] as $edge) {
                if ($visited[$edge] === false) {
                    $queue[] = $edge;
                    $visited[$edge] = true;
                }
            }
        }
    }
}