<?php

$arr = array(21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70);
echo 'Before: ' . implode(',', $arr) . "\n";

function quick_sort($arr, $pivot='left') {
  $len = count($arr);

  if ($len <= 1)
    return $arr;
  
  $left = $right = array();


  switch ($pivot) {
    case 'left':
      $mid_value = $arr[0];
      
      for ($i = 1; $i < $len; $i++) {
        if ($arr[$i] < $mid_value) {
          $left[] = $arr[$i]; // array_push
        } else {
          $right[] = $arr[$i];
        }
      }
      break;
    case 'middle':
      $mid_index = $len>>1;
      $mid_value = $arr[$mid_index];

      for ($i = 1; $i < $len; $i++) {
        if ($i == $mid_index)
          continue;
          
        if ($arr[$i] < $mid_value) {
          $left[] = $arr[$i]; // array_push
        } else {
          $right[] = $arr[$i];
        }
      }
      break;
    default:
      # code...
      break;
  }

  return array_merge(quick_sort($left, $pivot), (array)$mid_value, quick_sort($right, $pivot)); // mid_value 轉型
}

$start = microtime(true);
$arr = quick_sort($arr, 'left');
$end = microtime(true);
$totalTime = number_format(($end - $start) * 1000, 5, '.', '');
echo 'After: ' . implode(',', $arr) . "\n";

echo 'Total Execution Time: ' . $totalTime . 'ms' . "\n";