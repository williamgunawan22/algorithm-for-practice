<?php

function bubble_sort($arr) {
    $arrLen = count($arr);

    for ($itr1 = 0; $itr1 < $arrLen; $itr1++) {
        $swap = false;
        // the main idea of bubble sort is push the arr to the end until
        // it meet other arr with bigger value than the arr
        for($itr2 = 0; $itr2 < $arrLen-1-$itr1; $itr2++) {
            if ($arr[$itr2+1] < $arr[$itr2]) {
                // swap position
                $tmp = $arr[$itr2];
                $arr[$itr2] = $arr[$itr2+1];
                $arr[$itr2+1] = $tmp;
                $swap = true;
            }
        }

        // we add swap flag to break the loop if no swap action. no swap action
        // mean array already sorted so not necessary to continue the first loop
        if ($swap == false) {
            break;
        }
    }

    return $arr;
}

var_dump(bubble_sort([12,11,3,2,1,4,5,6,9,7,8,2,1,4,5,6,7]));