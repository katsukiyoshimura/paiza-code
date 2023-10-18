<?php
    getAreaInfo();
    getInitData();
    extendLine($height, $input);
    // print_r($input);
    extendColumn($height, $width, $input);
    output($height, $input);
    
    function getAreaInfo() {
        global $height, $width;
        [$height, $width] = explode(" ", trim(fgets(STDIN)));
    }
    
    function getInitData() {
        global $input;
        $input = [];
        for ($line = 0; $line < 2; $line++) {
            $input[] = explode(" ", trim(fgets(STDIN)));
        }
    }

    function calculateAP($a, $b) {
        return $b * 2 - $a;
    }

    function extendLine($height, $input) {
        global $input;
        for ($line = 2; $line < $height; $line++) {
            for ($column = 0; $column < 2; $column++) {
                $input[$line][$column] = calculateAP($input[$line-2][$column], $input[$line-1][$column]);
            }
        }
    }
    
    function extendColumn($height, $width, $input) {
        global $input;
        for ($line = 0; $line < $height; $line++) {
            for ($column = 2; $column < $width; $column++) {
                $input[$line][$column] = calculateAP($input[$line][$column-2], $input[$line][$column-1]);
            }
        }
    }
    
    function output($height, $input) {
        for ($i = 0; $i < $height; $i++) {
            echo implode(" ", $input[$i])."\n";
        }
    }
?>