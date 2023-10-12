<?php
    $input_line = trim(fgets(STDIN));
    [$height, $width, $savePointsCount] = explode(" ", $input_line);

    // マップを取得
    $map = [];
    for ($i = 0; $i < $height; $i++) {
        $map[] = str_split(trim(fgets(STDIN)));
    }

    $savePoints = [];
    $playerPosition = [];

    for ($i = 0; $i < $height; $i++) {
        for ($j = 0; $j < $width; $j++) {
            if (is_numeric($map[$i][$j])) {
                $savePoints[(int)$map[$i][$j]] = [$i, $j];
            } elseif ($map[$i][$j] == "N") {
                $playerPosition = [$i, $j];
            }
        }
    }
    ksort($savePoints);  // セーブポイントを番号順にソート

    $distances = [];
    foreach ($savePoints as $key => $point) {
        $distances[$key] = abs($point[0] - $playerPosition[0]) + abs($point[1] - $playerPosition[1]);
    }

    // 最短距離のセーブポイントを取得
    $minDistance = min($distances);
    $nearestSavePoints = array_keys($distances, $minDistance);

    echo count($nearestSavePoints) . "\n";
    foreach ($nearestSavePoints as $point) {
        echo $point . "\n";
    }
?>
