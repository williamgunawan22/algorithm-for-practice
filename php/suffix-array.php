<?php 
class SuffixArray
{
    private $suffixArray;
    private $suffixes;
    public function __construct($str) {
        list($this->suffixes, $this->suffixArray) = $this->buildSuffixArray($str);
    }

    public function customMergeSort($arr, $value)
    {
        if (count($arr) < 2) {
            return $arr;
        }

        $middle = count($arr)/2;
        $left = array_slice($arr, 0, $middle);
        $right = array_slice($arr, $middle);

        $left = $this->customMergeSort($left, $value);
        $right = $this->customMergeSort($right, $value);

        return $this->merge($left, $right, $value);
    }

    public function merge($left, $right, $value)
    {
        $leftIdx = $rightIdx = 0;
        $leftLen = count($left);
        $rightLen = count($right);
        $result = [];
        while ($leftIdx < $leftLen && $rightIdx < $rightLen) {
            // compare string value, use array value to point to string in value variable
            // because array and value seperated
            if ($value[$left[$leftIdx]] <= $value[$right[$rightIdx]]) {
                $result[] = $left[$leftIdx];
                $leftIdx++;
            } else {
                $result[] = $right[$rightIdx];
                $rightIdx++;
            }
        }

        while ($leftIdx < $leftLen) {
            $result[] = $left[$leftIdx];
            $leftIdx++;
        }

        while ($rightIdx < $rightLen) {
            $result[] = $right[$rightIdx];
            $rightIdx++;
        }

        return $result;
    }

    public function buildSuffixArray($str)
    {
        $suffixes = [];
        $suffixArray = [];

        $strLen = strlen($str);

        // create suffixes and unsorted suffix array
        for ($idx =0; $idx < $strLen; $idx++) {
            $suffixes[] = substr($str, $idx);
            $suffixArray[] = $idx;
        }

        // sort suffix array with custom merge sort, because array and the value seperated. array int point to value str
        $suffixArray = $this->customMergeSort($suffixArray, $suffixes);

        return [$suffixes, $suffixArray];
    }

    public function search($pattern) {
        // using binary search combine with string compare function
        $left = 0;
        $right = count($this->suffixArray)-1;
        $patternLen = strlen($pattern);
        while($left <= $right) {
            $middle = floor(($left+$right)/2);
            $targetStr = substr($this->suffixes[$this->suffixArray[$middle]],0,$patternLen);
            $cmp = strcmp($pattern, $targetStr);

            // we are using strcmp to check different char has greater/lower position
            // in alphabet/ascii
            if ($cmp == 0) {
                return $this->suffixArray[$middle];
            } 
            // cmp have -1 value if middle different char lower than pattern char
            // so adjust to left side.
            elseif ($cmp < 0) {
                $right = $middle-1;
            } 
            // cmp have 1 value if middle different char higher than pattern char
            // adjust to right side.
            elseif ($cmp > 0) {
                $left = $middle+1;
            }
        }
        
        return null;
    }
}

$str = "i want to eat something delicious";
$suffixArray = new SuffixArray($str);
$searchStr = "eat";
$index = $suffixArray->search($searchStr);
$resultStr = substr($str, $index, strlen($searchStr));
echo "index is $index and result str is $resultStr";