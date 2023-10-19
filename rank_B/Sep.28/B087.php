<?php
    getInfo();
    getData();
    outputMaxNum($height, $width, $digit, $input);
    
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
        return $input[$array0][$array1];
    }
    
    function getMaxNum(&$maxNum, $num) {  
        $maxNum = max($maxNum, intval($num));
    }
    
    function outputMaxNum($height, $width, $digit, $input) {
        $maxNum = -1;
        for ($line = 0; $line < $height; $line++) {
            for ($column = 0; $column < $width; $column++) {
                // 上から下
                if ($line + $digit <= $height) {
                    $num = "";
                    for ($targetDigit = 0; $targetDigit < $digit; $targetDigit++) {
                        $num .= getNum($input, $line + $targetDigit, $column);
                    }
                    getMaxNum($maxNum, $num);
                }
                // 左から右
                if ($column + $digit <= $width) {
                    $num = "";
                    for ($targetDigit = 0; $targetDigit < $digit; $targetDigit++) {
                        $num .= getNum($input, $line, $column + $targetDigit);
                    }
                    getMaxNum($maxNum, $num);
                }
            }
        }
        echo $maxNum;
    }
?>