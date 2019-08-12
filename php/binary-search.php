<?php

function binary_search($arr, $target) {
    $left =0;
    $right = count($arr) -1;

    // the main idea of binary search is to cut search area by adjust left or right position
    // and check at middle position of the area. array must be sorted!
    while($left <= $right) {
        $middle = floor(($left+$right)/2);
        // if match then return the array index
        if ($arr[$middle] == $target) {
            return $middle;
        } 
        // adjust area to left side by change right point.
        elseif ($target < $arr[$middle]) {
            $right = $middle-1;
        } 
        // adjust area to right side by change left point.
        else {
            $left = $middle+1;
        }
    }

    return null;
}

echo "work! " . binary_search([1,2,3,4,5,6,7,8], 3);