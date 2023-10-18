<?php
    getInfo();
    outputPosition($width, $height, $num, $x, $y);
    
    function getInfo() {
        global $width, $height, $num, $x, $y;
        [$width, $height, $num] = explode(" ", trim(fgets(STDIN)));
        [$x, $y] = explode(" ", trim(fgets(STDIN)));
    }
    
    function moveWithinBounds($position, $max, $delta) {
        $position += $delta;
        $position %= $max; // 余りを出す
        if ($position < 0) {
            $position += $max; 
        }
        return $position;
    }
   
    function outputPosition($width, $height, $num, $x, $y) {
        for ($i = 0; $i < $num; $i++) {
            $move = trim(fgets(STDIN));
            [$direct, $distance] = explode(" ", $move);
        
            switch ($direct) {
                case "U":
                    $y = moveWithinBounds($y, $height, $distance);
                    break;
                case "D":
                    $y = moveWithinBounds($y, $height, -$distance);
                    break;
                case "R":
                    $x = moveWithinBounds($x, $width, $distance);
                    break;
                case "L":
                    $x = moveWithinBounds($x, $width, -$distance);
                    break;
            }
        }
        
        echo $x . " " . $y;
    }

?>
