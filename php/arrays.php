<?php

$arr = [1, 2, 3, 4];
// $result = array_filter($arr, function($nb) {
//     return $nb % 2 == 0;
// });

// $result = array_map(function($nb) {
//     return "test";
// }, $arr);

$result = array_reduce($arr, function($total, $nb) {
    return $total + $nb;
}, 20);

echo "<pre>";
print_r($result);
echo "</pre>";