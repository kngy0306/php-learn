<?php
// 3 5 200
// 1 2 3
// 4 5 6 7 8
fscanf(STDIN, "%d %d %d", $n, $m, $k);
list($n, $m, $k) = explode(' ', trim(fgets(STDIN)));

$A = array_map('intval', explode(' ', trim(fgets(STDIN))));
$B = array_map('intval', explode(' ', trim(fgets(STDIN))));
?>