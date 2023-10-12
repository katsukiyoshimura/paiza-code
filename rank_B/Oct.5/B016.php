<?php

$input_line = trim(fgets(STDIN));
[$w, $h, $n] = explode(" ", $input_line);

$input = trim(fgets(STDIN));
[$x, $y] = explode(" ", $input);

function moveWithinBounds($position, $max, $delta) {
    $position += $delta;
    $position %= $max; // 余りを出す
    if ($position < 0) {
        $position += $max; 
    }
    return $position;
}

for ($i = 0; $i < $n; $i++) {
    $move = trim(fgets(STDIN));
    [$direct, $distance] = explode(" ", $move);

    switch ($direct) {
        case "U":
            $y = moveWithinBounds($y, $h, $distance);
            break;
        case "D":
            $y = moveWithinBounds($y, $h, -$distance);
            break;
        case "R":
            $x = moveWithinBounds($x, $w, $distance);
            break;
        case "L":
            $x = moveWithinBounds($x, $w, -$distance);
            break;
    }
}

echo $x . " " . $y;

?>
