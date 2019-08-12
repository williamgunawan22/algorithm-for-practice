function insertionSort(arr) {
    let arrLen = arr.length;
    if (arrLen < 2) return arr;


    for(let forwardIdx=1; forwardIdx < arrLen; forwardIdx++) {
        // the main idea of insertion sort is push smaller arr value to left
        // and break the loop if already reach the limit
        // so this poin is the key point
        for (let backwardIdx=forwardIdx-1; backwardIdx >= 0; backwardIdx--) {
            if (arr[backwardIdx] > arr[backwardIdx+1]) {
                // swap position
                let tmp = arr[backwardIdx];
                arr[backwardIdx] = arr[backwardIdx+1];
                arr[backwardIdx+1] = tmp;
            } else {
                break;
            }
        }
    }
    return arr;
}

console.log(insertionSort([9,3,2,1,5,6,7,8,4,10]));