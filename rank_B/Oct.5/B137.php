<?php

function hasAdjacentSameColor($board, $i, $j, $n, $m) {
    $currentColor = $board[$i][$j];
    $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

    foreach ($directions as $dir) {
        $ni = $i + $dir[0];
        $nj = $j + $dir[1];

        if ($ni >= 0 && $ni < $n && $nj >= 0 && $nj < $m && $board[$ni][$nj] === $currentColor) {
            return true;
        }
    }
    return false;
}

function dropDown($board, $n, $m) {
    for ($j = 0; $j < $m; $j++) {
        $write = $n - 1;
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($board[$i][$j] !== '#') {
                $board[$write][$j] = $board[$i][$j];
                if ($write !== $i) {
                    $board[$i][$j] = '#';
                }
                $write--;
            }
        }
    }
    return $board;
}

[$n, $m, $x] = explode(" ", trim(fgets(STDIN)));

$board = [];
for ($i = 0; $i < $n; $i++) {
    $board[] = explode(" ", trim(fgets(STDIN)));
}

$toBeRemoved = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        if (hasAdjacentSameColor($board, $i, $j, $n, $m)) {
            $toBeRemoved[] = [$i, $j];
        }
    }
}

foreach ($toBeRemoved as $pos) {
    $board[$pos[0]][$pos[1]] = '#';
}

$board = dropDown($board, $n, $m);

foreach ($board as $row) {
    echo implode(" ", $row) . "\n";
}

?>
