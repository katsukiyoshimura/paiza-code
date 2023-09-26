<?php
    $input_line = trim(fgets(STDIN));
    [$n, $m] = explode(" ", $input_line);
    
    // ページを取得
    $page = ceil($m/$n);
    
    if ($page % 2 == 1) {
        $x = $page;
    } else {
        $x = $page - 1;
    }
    echo 2 * $n * $x + 1 - $m;
?>