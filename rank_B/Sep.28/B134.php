<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    [$n, $m] = explode(" ", $input_line);
    
    $input = [];
    for ($i = 0; $i < $n; $i++) {
        $a = str_repeat(0, $m);
        $input[] = str_split($a);
    }
    // print_r($input);
    
    $t = [];
    $x = [];
    $y = [];
    $s = trim(fgets(STDIN));
    for ($i = 0; $i < $s; $i++) {
        $b = trim(fgets(STDIN));
        $array[] = explode(" ", $b);
        $t[] = ($array[$i][0]-1)/2;
        $x[] = $array[$i][1]-1;
        $y[] = $array[$i][2]-1;
    }
    // print_r($x);
    
    for ($i = 0; $i < $s; $i++) {
        $c = $x[$i];
        $d = $y[$i];
        for ($j = -$t[$i]; $j <= $t[$i]; $j++) {
            for ($k = -$t[$i]; $k <= $t[$i]; $k++) {
                if (is_numeric($input[$d+$j][$c+$k])) {
                    $input[$d+$j][$c+$k]++;
                }
            }
        }
        if ($t[$i] > 0) {
            for ($j = -$t[$i]+1; $j <= $t[$i]-1; $j++) {
                for ($k = -$t[$i]+1; $k <= $t[$i]-1; $k++) {
                    if (is_numeric($input[$d+$j][$c+$k])) {
                        $input[$d+$j][$c+$k]--;
                    }
                }
            }
        }
    }
    for ($i = 0; $i < $n; $i++) {
        echo implode(" ", $input[$i])."\n";
    }
?>