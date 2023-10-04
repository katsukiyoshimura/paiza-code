<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    [$h, $w, $t] = explode(" ", $input_line);
    
    $input = [];
    for ($i = 0; $i < $h+$w; $i++) {
        if ($i < $h) {
            $input[$i][0] = "M";
            $input[$i][1] = $i+1;
            $input[$i][2] = 0; // 初期x座標
            $input[$i][3] = $i+1; // y座標
        } else {
            $input[$i][0] = "F";
            $input[$i][1] = $i-$h+1;
            $input[$i][2] = $i-$h+1; // x座標
            $input[$i][3] = 0; // 初期y座標
        }
    }
    
    for ($i = 0; $i < $t; $i++) {
        for ($j = 0; $j < $h; $j++) {
            if (floor($i/$w) % 2 == 0) {
                $input[$j][2]++;
            } else {
                $input[$j][2]--;
            }
        }
        
        for ($k = $h; $k < $h+$w; $k++) {
            if (floor($i/$h) % 2 == 0) {
                $input[$k][3]++;
            } else {
                $input[$k][3]--;
            }
        }
        
        for ($j = 0; $j < $h; $j++) {
            for ($k = $h; $k < $h+$w; $k++) {
                if (($input[$j][2] == $input[$k][2]) && ($input[$j][3] == $input[$k][3])){
                    $tmp[0] = $input[$j][0];
                    $tmp[1] = $input[$j][1];
                    $input[$j][0] = $input[$k][0];
                    $input[$j][1] = $input[$k][1];
                    $input[$k][0] = $tmp[0];
                    $input[$k][1] = $tmp[1];
                }
            }
        }
    }
    
    for ($i = 0; $i < $h+$w; $i++) {
        echo $input[$i][0]. " ". $input[$i][1]."\n";
    }
?>