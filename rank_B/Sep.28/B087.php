<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    getInfo();
    getData();
    
    
    function getInfo() {
        global $height, $width, $digit;
        [$height, $width, $digit] = explode(" ", trim(fgets(STDIN)));
    }

    function getData() {
        global $height, $input;
        $input = [];
        for ($line = 0; $line < $height; $line++) {
            $input[] = str_split(trim(fgets(STDIN)));
        }
    }
    
    function getNum($input, $array0, $array1) {
        global $num;
        $num .= $input[$array0][$array1];
    }
    
    function getMaxNum($maxNum, $num) {
        global $maxNum;
        $maxNum = max($maxNum, intval($num));
    }
   
    
    $maxNum = -1;
    for ($line = 0; $line < $height; $line++) {
        for ($column = 0; $column < $width; $column++) {
            // 上から下
            if ($line + $digit <= $height) {
                $num = "";
                for ($targetDigit = 0; $targetDigit < $digit; $targetDigit++) {
                    getNum($input, $line + $targetDigit, $column);
                }
                getMaxNum($maxNum, $num);
            }
            // 左から右
            if ($column + $digit <= $width) {
                $num = "";
                for ($targetDigit = 0; $targetDigit < $digit; $targetDigit++) {
                    getNum($input, $line, $column + $targetDigit);
                }
                getMaxNum($maxNum, $num);
            }
        }
    }
        
    echo $maxNum;
    
?>