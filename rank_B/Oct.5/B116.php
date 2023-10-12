<?php
    $input_line = trim(fgets(STDIN));
    [$h, $w, $t] = explode(" ", $input_line);
    
    $participants = [];

    // 初期位置とプレゼントの情報を設定
    for ($i = 0; $i < $h + $w; $i++) {
        if ($i < $h) {
            $participants[] = ["type" => "M", "id" => $i + 1, "x" => 0, "y" => $i + 1];
        } else {
            $participants[] = ["type" => "F", "id" => $i - $h + 1, "x" => $i - $h + 1, "y" => 0];
        }
    }

    for ($i = 0; $i < $t; $i++) {
        // 男性の移動
        $menDirection = floor($i/$w) % 2 == 0 ? 1 : -1;
        for ($j = 0; $j < $h; $j++) {
            $participants[$j]['x'] += $menDirection;
        }
        
        // 女性の移動
        $womenDirection = floor($i/$h) % 2 == 0 ? 1 : -1;
        for ($k = $h; $k < $h + $w; $k++) {
            $participants[$k]['y'] += $womenDirection;
        }
        
        // プレゼントの交換を確認
        for ($j = 0; $j < $h; $j++) {
            for ($k = $h; $k < $h + $w; $k++) {
                if ($participants[$j]['x'] == $participants[$k]['x'] && $participants[$j]['y'] == $participants[$k]['y']) {
                    [$participants[$j]['type'], $participants[$k]['type']] = [$participants[$k]['type'], $participants[$j]['type']];
                    [$participants[$j]['id'], $participants[$k]['id']] = [$participants[$k]['id'], $participants[$j]['id']];
                }
            }
        }
    }

    foreach ($participants as $participant) {
        echo $participant['type'] . " " . $participant['id'] . "\n";
    }
?>
