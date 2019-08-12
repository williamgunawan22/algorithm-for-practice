function mergeSort(arr) {
    let arrLen = arr.length;
    if (arrLen < 2) return arr;

    // split array to two part
    let middle = arrLen/2;
    let left = arr.slice(0, middle);
    let right = arr.slice(middle);

    // recursion for each part until array lower than 2
    left = mergeSort(left);
    right = mergeSort(right);

    // magic happen in merge function
    return merge(left, right);
}

function merge(left, right) {
    let leftIdx = 0;
    let rightIdx = 0;
    let leftLen = left.length;
    let rightLen = right.length;
    let result = [];

    // loop for comparasion whenever left and right array index not reach the end
    while(leftIdx < leftLen && rightIdx < rightLen) {
        if (left[leftIdx] <= right[rightIdx]) {
            result.push(left[leftIdx]);
            leftIdx++;
        } else {
            result.push(right[rightIdx]);
            rightIdx++;
        }
    }

    // clean up for left part
    while(leftIdx < leftLen) {
        result.push(left[leftIdx]);
        leftIdx++;
    }

    // clean up for right part. 
    // all array must put in the result.
    while(rightIdx < rightLen) {
        result.push(right[rightIdx]);
        rightIdx++;
    }

    return result;
}

console.log(mergeSort([9,8,7,6,5,1,2,3,4]));