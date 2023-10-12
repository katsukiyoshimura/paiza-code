<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    
    $init = [];
    
    for ($i = 0; $i < $n; $i++) {
        $input = trim(fgets(STDIN));
        $init[$i] = explode(" ", $input);
    }
    // print_r($init);
    
    $input_line = trim(fgets(STDIN));
    [$x, $y, $s, $angle] = explode(" ", $input_line);
    
    $round = [];
    if ($angle == 90) {
        for ($i = 0; $i < $s; $i++) {
            for ($j = 0; $j < $s; $j++) {
                //
            }
        }
    }
    print_r($init);
    
?>