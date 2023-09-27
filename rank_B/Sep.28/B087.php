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
    
    //横にk個の数を抽出
    $yoko = [];
    for ($i = 0; $i < $h; $i++) {
        for ($l = 0; $l <= $w-$k; $l++) {
            for ($j = $l; $j < $k+$l; $j++) {
                $yoko[$i][$l][] = $input[$i][$j];
            }
        }
    }
    
    //縦にk個の数を抽出
    $tate = [];
    for ($i = 0; $i < $w; $i++) {
        for ($l = 0; $l <= $h-$k; $l++) {
            for ($j = $l; $j < $k+$l; $j++) {
                $tate[$i][$l][] = $input[$j][$i];
            }
        }
    }
    
    $get = [];
    //横にk桁の数を抽出
    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j <= $w-$k; $j++) {
            $a = 0;
            for ($l = 0; $l < $k; $l++) {
                $a +=  $yoko[$i][$j][$l] * (10**($k-$l-1));
                
            }
            $get[] = $a;
        }
    }
    
    //縦にk桁の数を抽出
    for ($i = 0; $i < $w; $i++) {
        for ($j = 0; $j <= $h-$k; $j++) {
            $a = 0;
            for ($l = 0; $l < $k; $l++) {
                $a +=  $tate[$i][$j][$l] * (10**($k-$l-1));
                
            }
            $get[] = $a;
        }
    }
    echo max($get);
?>