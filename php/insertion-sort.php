<?php 

function insertion_sort($arr) {
    $arrLen = count($arr);

    for($fwdIdx =1; $fwdIdx < $arrLen; $fwdIdx++) {
        // the main idea of insertion sort is push smaller arr value to left
        // and break the loop if already reach the limit
        // so this part is the key point
        for($bwdIdx = $fwdIdx-1; $bwdIdx >= 0; $bwdIdx--) {
            if ($arr[$bwdIdx+1] < $arr[$bwdIdx]) {
                // swap position
                $tmp = $arr[$bwdIdx];
                $arr[$bwdIdx] = $arr[$bwdIdx+1];
                $arr[$bwdIdx+1] = $tmp;
            } else {
                break;
            }
        }
    }
    return $arr;
}

var_dump(insertion_sort([1,2,3,6,5,4,8,7,9]));