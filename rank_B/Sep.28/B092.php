<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    [$h, $w, $k] = explode(" ", $input_line);
    
    //マップを取得
    $map = [];
    for ($i = 0; $i < $h; $i++) {
        $input = trim(fgets(STDIN));
        $map[] = str_split($input);
    }
    // print_r($map);
    // セーブポイント位置と現在位置を取得する
    $num = [];
    $now = [];
    
    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j < $w; $j++) {
            if (is_numeric($map[$i][$j])) {
                $num[] = [$i, $j, $map[$i][$j]];
            } elseif ($map[$i][$j] == "N") {
                $now[] = [$i, $j];
            }
        }
    }
    // セーブポイントを昇順で並び替える
    usort($num, function($a, $b) {
    return $a[2] <=> $b[2];
    });
    // print_r($num);
    
    $distance = [];
    for ($i = 0; $i < $k; $i++) {
        $distance[] = abs($num[$i][0] - $now[0][0]) + abs($num[$i][1] - $now[0][1]);
    }
    
    // 最短距離のセーブポイントの数を出力する
    $min = min($distance);
    $c = 0;
    for ($i = 0; $i < $k; $i++) {
        if ($distance[$i] == $min) {
            $c++;
        }
    }
    echo $c."\n";
    
    // 最短距離にあるセーブポイントを出力する
    for ($i = 0; $i < $k; $i++) {
        if ($distance[$i] == $min) {
            echo ($i+1)."\n";
        }
    }
?>