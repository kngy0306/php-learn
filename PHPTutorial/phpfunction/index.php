<?php
  $n1 = 10;
  $n2 = 20;

  function sum($start, $end, $max) {
    if ($start < $max) {
      $start += $end;
      echo $start . "<br>";
      sum($start, $end, $max);
    }
  }

  sum(0, 10, 100);