<?php
    $n = trim(fgets(STDIN));
    
    $change_time = [];
    $delay_time = [];
    $delay_change_time = [];
    $change_size = [];
    $correct = [];
    $delay = [];
    
    for ($i = 0; $i < $n; $i++) {
        $input = trim(fgets(STDIN));
        [$change_time[], $delay_time[], $change_size[]] = explode(" ", $input);
        $delay_change_time[$i] = $change_time[$i] + $delay_time[$i];
    }
    
    // 正確なスコアと表示スコアについて、0番目に変化の時間を、1番目に変化量を格納
    for ($i = 0; $i < $n; $i++) {
        $correct[] = [$change_time[$i], $change_size[$i]];
        $delay[] = [$delay_change_time[$i], $change_size[$i]];
    }
    
    // $correct, $delayについて時間順に並び替える
    usort($correct, function($a, $b) {
        return $a[0] <=> $b[0];
    });
    
    usort($delay, function($a, $b) {
        return $a[0] <=> $b[0];
    });
    
    $question_num = trim(fgets(STDIN)); // 質問回数
    $question_time = []; // 質問時間を配列に格納
    for ($i = 0; $i < $question_num; $i++) {
        $question_time[] = trim(fgets(STDIN));
    }
    
    $score = 0;
    $scores = [];
    
    for ($i = 1; $i <= max($question_time); $i++) {
        // スコア変化
        for ($j = 0; $j < $n; $j++) {
            // スコア変化が起こった時間
            if ($i == $correct[$j][0]) {
                $score += $correct[$j][1];
            }
            // スコア表示が変化した時間
            if ($i == $delay[$j][0]) {
                $score -= $delay[$j][1];
            }
        }
        $scores[] = $score;
    }
    
    // 質問時間ごとにスコアを出力
    for ($i = 0; $i < $question_num; $i++) {
        echo $scores[$question_time[$i] - 1]."\n";
    }
?>