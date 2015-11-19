<?php
function test($func) {
  $count = 10;
  $total = 0;
  for ($i = 0;$i < $count;$i++) {
    $total += lap($func);
  }
  return $total / $count;
}

function lap($func) {
  $t0 = microtime(1);
  $numbers = range(0, 1000000);
  $ret = $func($numbers);
  $t1 = microtime(1);
  return $t1 - $t0;
}

function useArray($numbers)  {
  $result = array();
  foreach ($numbers as $number) {
      $result[] = $number * 10;
  }
  return $result;
}

function useMapClosure($numbers) {
  return array_map(function($number) {
      return $number * 10;
  }, $numbers);
}

function _tenTimes($number) {
    return $number * 10;
}

function useMapNamed($numbers) {
  return array_map('_tenTimes', $numbers);
}

function useMapClosureI($numbers) {
  $i = 10;
  return array_map(function($number) use ($i) {
      return $number * $i++;
  }, $numbers);
}

function useArrayI($numbers)  {
  $result = array();
  $i = 10;
  foreach ($numbers as $number) {
    $result[] = $number * $i++;
  }
  return $result;
}

foreach (array('Array', 'MapClosure', 'MapNamed', 'MapClosureI', 'ArrayI') as $callback) {
  $delay = test("use$callback");
  echo "$callback: $delay\n";
}
