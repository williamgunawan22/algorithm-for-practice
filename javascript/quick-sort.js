function quickSort(arr) {
    if (arr.length < 2) return arr;

    // take out first index for pivot
    let pivot = arr.shift();
    let arrLen = arr.length;
    let left = [];
    let right = [];

    for(let itr= 0; itr < arrLen; itr++) {
        // distribute to left part if arr equal or smaller than pivot
        if (arr[itr] <= pivot) {
            left.push(arr[itr]);
        }
        // for the remaining, put to right side. it must be greater than pivot.
        else if (arr[itr] > pivot) {
            right.push(arr[itr])
        }
    }

    // put them together with pivot in center. left - pivot - right
    return [].concat(quickSort(left), [pivot], quickSort(right));
}

console.log(quickSort([4,3,2,1,5,6,7,9,8]));