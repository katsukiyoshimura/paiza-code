<?php
    $column_num = trim(fgets(STDIN)); // 列数
    
    $input = trim(fgets(STDIN));
    $column_name = explode(" ", $input);
    
    $date_num = trim(fgets(STDIN)); // データの数
    
    $data = [];
    for ($i = 0; $i < $date_num; $i++) {
        $input = trim(fgets(STDIN));
        $data[] = explode(" ", $input);
    }
   
   $length = [];
    // 各列について最大の文字数を得る
    for ($i = 0; $i < $column_num; $i++) {
        $length[$i][] = strlen($column_name[$i]);
        for ($j = 0; $j < $date_num; $j++) {
            $length[$i][] = strlen($data[$j][$i]);
        }
        $max_length[] = max($length[$i]);
    }
    
    // 1行目
    for ($i = 0; $i < $column_num; $i++) {
        $empty_num = $max_length[$i] - strlen($column_name[$i]) + 1;
        echo "| ". $column_name[$i]. str_repeat(" ", $empty_num);
    }
    echo "|\n";
    
    // 2行目
    for ($i = 0; $i < $column_num; $i++) {
        echo "|-". str_repeat("-", $max_length[$i]). "-";
    }
    echo "|\n";
    
    // 3行目以降
    for ($i = 0; $i < $date_num; $i++) {
        for ($j = 0; $j < $column_num; $j++) {
            $empty_num = $max_length[$j] - strlen($data[$i][$j]) + 1;
            echo "| ". $data[$i][$j]. str_repeat(" ", $empty_num);
        }
        echo "|\n";
    }
?>