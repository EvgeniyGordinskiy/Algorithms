<?php

$users = [
    ['v' => 1,  's' => 7],
    ['v' => 2, 's' => 1],
    ['v' => 1,  's' => 3],
];
$shortestDistance = array_filter(range(min(array_column($users, 's')), max(array_column($users, 's'))),
    function($item) use ($users) {
        $firstTime = abs(($item - $users[0]['s'])) / $users[0]['v'];
        $same = [];
        array_shift($users);
        foreach ($users as $user) {
            $time = abs(($item - $user['s'])) / $user['v'];
            if ( $time === $firstTime ) {
                $same[] = 1;
            }
        }
        return count($users) === count($same);
    });

var_dump($shortestDistance); // 5