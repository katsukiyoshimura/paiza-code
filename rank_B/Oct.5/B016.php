<?php
    $input_line = trim(fgets(STDIN));
    [$w, $h, $n] = explode(" ", $input_line);
    
    $input = trim(fgets(STDIN));
    [$x, $y] = explode(" ", $input);
    
    // $x, $y が枠をはみ出る場合は横、縦の長さで割った余りが現在位置になる
    for ($i = 0; $i < $n; $i++) {
        $move = trim(fgets(STDIN));
        [$direct, $distance] = explode(" ", $move);
        if ($direct == "U") {
            $y += $distance;
            if ($y >= $h) {
                $y -= floor($y/$h) * $h;
            }
        } elseif ($direct == "D") {
            $y -= $distance;
            if ($y < 0) {
                $y += abs(floor($y/$h)) * $h;
            }
        } elseif ($direct == "R") {
            $x += $distance;
            if ($x >= $w) {
                $x -= floor($x/$w) * $w;
            }
        } else {
            $x -= $distance;
            if ($x < 0) {
                $x += abs(floor($x/$w)) * $w;
            }
        }
    }
    echo $x. " ". $y;
    
?>