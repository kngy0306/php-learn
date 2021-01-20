<?php
$input = array(1, 2, 3, 4, 5, 6);

// $filter_even = function($item) {
//   return ($item%2) == 0;
// };
function greater_than($min){
  return function($item) use($min){
    return $item > $min;
  };
}

$output = array_filter($input, greater_than(3));

print_r($output);