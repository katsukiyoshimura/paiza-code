<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    [$h, $w, $k] = explode(" ", $input_line);
    $input = [];
    
    for ($i = 0; $i < $h; $i++) {
        $a = trim(fgets(STDIN));
        $input[] = str_split($a);
    }
    
    $maxNum = -1;
    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j < $w; $j++) {
            // 上から下
            if ($i + $k <= $h) {
                $num = "";
                for ($m = 0; $m < $k; $m++) {
                    $num .= $input[$i + $m][$j];
                }
                $maxNum = max($maxNum, intval($num));
            }
            // 左から右
            if ($j + $k <= $w) {
                $num = "";
                for ($m = 0; $m < $k; $m++) {
                    $num .= $input[$i][$j + $m];
                }
                $maxNum = max($maxNum, intval($num));
            }
        }
    }
    
    echo $maxNum;
?>