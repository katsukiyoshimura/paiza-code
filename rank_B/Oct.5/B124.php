<?php
    $n = trim(fgets(STDIN));
    $common = [];
    
    for ($i = 0; $i < $n; $i++) {
        $input[] = trim(fgets(STDIN));
    }

    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < strlen($input[$i]); $j++) {
            for ($k = 1; $k < strlen($input[$i])-$j+1; $k++) {
                $common[] = [substr($input[$i], $j, $k), $k];
            }
        }
    }
    
    $m = count($common);
    $a = [];
    
    for ($i = 0; $i < $m; $i++) {
        for ($j = $i+1; $j < $m; $j++) {
            if ($common[$i][0] == $common[$j][0]) {
                $a[] = $common[$i][1];
            }
        }
    }
    echo max($a);
?>