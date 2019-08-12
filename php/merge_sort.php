<?php 

function merge_sort($arr) {
    $length = count($arr);

    if ($length < 2) return $arr;

    // split array to two part
    $middle = $length/2;
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    // recursion for each part until array lower than 2
    $left = merge_sort($left);
    $right = merge_sort($right);

    // magic happen in merge function
    return merge($left, $right);
}

function merge($left, $right) {
    $leftIndex = $rightIndex = 0;
    $leftLen = count($left);
    $rightLen = count($right);
    $result = [];

    // loop for comparasion whenever left and right array index not reach the end
    while( $leftIndex < $leftLen && $rightIndex < $rightLen ) {
        if ($left[$leftIndex] <= $right[$rightIndex]) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    // clean up for left part
    while($leftIndex < $leftLen) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }

    // clean up for right part.
    // all array must put in the result.
    while($rightIndex < $rightLen) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }
    
    return $result;
}

var_dump(merge_sort([1,2,3,4,9,8,7,6,5]));