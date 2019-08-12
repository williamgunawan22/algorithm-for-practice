<?php 

function quick_sort($arr) {
    if (count($arr) < 2) return $arr;

    $left = $right = [];

    // take out first index for pivot
    $pivot = array_shift($arr);
    $length = count($arr);

    for ($itr = 0; $itr < $length; $itr++) {
        // distribute to left part if arr equal or smaller than pivot
        if ($arr[$itr] <= $pivot) {
            $left[] = $arr[$itr];
        }
        // for the remaining, put to right side. it must be greater than pivot.
        elseif ($arr[$itr] > $pivot) {
            $right[] = $arr[$itr];
        }
    }
    // put them together with pivot in center. left - pivot - right
    return array_merge(quick_sort($left), [$pivot], quick_sort($right));
}

var_dump(quick_sort([6,5,4,1,2,3]));