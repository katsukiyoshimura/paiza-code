<?php

    getInfo();
    getMap($height);
    getSavePointBySort($height, $width, $map);
    calculateDistance($savePoints, $playerPosition);
    outputNearestSavePoint($distances);

    function getInfo() {
        global $height, $width, $savePointsCount;
        [$height, $width, $savePointsCount] = explode(" ", trim(fgets(STDIN)));
    }

    
    function getMap($height) {
        global $map;
        $map = [];
        for ($i = 0; $i < $height; $i++) {
            $map[] = str_split(trim(fgets(STDIN)));
        }
    }
    
    function getSavePointBySort($height, $width, $map) {
        global $savePoints, $playerPosition;
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
    }

    function calculateDistance($savePoints, $playerPosition) {
        global $distances;
        $distances = [];
        foreach ($savePoints as $key => $point) {
            $distances[$key] = abs($point[0] - $playerPosition[0]) + abs($point[1] - $playerPosition[1]);
        }
    }

    function outputNearestSavePoint($distances) {
        $minDistance = min($distances);
        $nearestSavePoints = array_keys($distances, $minDistance);
    
        echo count($nearestSavePoints) . "\n";
        foreach ($nearestSavePoints as $point) {
            echo $point . "\n";
        }
    }
?>
