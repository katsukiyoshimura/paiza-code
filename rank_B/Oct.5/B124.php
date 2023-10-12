<?php

function longestCommonSubstring($str1, $str2) {
    $n = strlen($str1);
    $m = strlen($str2);
    $dp = array_fill(0, $n + 1, array_fill(0, $m + 1, 0)); 
    $result = 0; 

    // Calculate the length of the longest common substring
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $m; $j++) {
            if ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                $result = max($result, $dp[$i][$j]);
            } else {
                $dp[$i][$j] = 0;
            }
        }
    }

    return $result;
}

$n = trim(fgets(STDIN));
$names = [];
for ($i = 0; $i < $n; $i++) {
    $names[] = trim(fgets(STDIN));
}

// 被りの最大数を得る
$max_similarity = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $max_similarity = max($max_similarity, longestCommonSubstring($names[$i], $names[$j]));
    }
}

echo $max_similarity . "\n";

?>
