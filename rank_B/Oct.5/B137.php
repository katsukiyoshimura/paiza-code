<?php
    $input_line = trim(fgets(STDIN));
    [$n, $m, $x] = explode(" ", $input_line);
    
    $array = [];
    
    for ($i = 0; $i < $n; $i++) {
        $input = trim(fgets(STDIN));
        $array[] = explode(" ", $input);
    }
    
    $copy = [];
    // 配列の値を0にセットする
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $copy[$i][$j] = 0;
        }
    }
    
    // 上下左右に同じ文字があれば1にセットする
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if (($array[$i][$j] == $array[$i+1][$j]) || ($array[$i][$j] == $array[$i-1][$j]) || ($array[$i][$j] == $array[$i][$j+1]) || ($array[$i][$j] == $array[$i][$j-1])) {
                $copy[$i][$j]++;
            }
        }
    }
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($copy[$i][$j] == 1) {
                $array[$i][$j] = "#";
            }
        }
    }
    
    for ($k = 0; $k < $n; $k++) {
        for ($i = $n-2; $i >= 0; $i--) {
            for ($j = 0; $j < $m; $j++) {
                if ($array[$i+1][$j] == "#") {
                    $array[$i+1][$j] = $array[$i][$j];
                    $array[$i][$j] = "#";
                }
            }
        }
    }
    
    for ($i = 0; $i < $n; $i++) {
        $output = implode(" ", $array[$i]);
        echo $output."\n";
    } 
?>