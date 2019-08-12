function bubbleSort(arr) {
    let arrLen = arr.length;
    if (arrLen < 2) return arr;

    for(let itr1 =0; itr1 < arrLen; itr1++) {
        let swap = false;
        
        // the main idea of bubble sort is push the arr to the end until
        // it meet other arr with bigger value than the arr
        for(let itr2 = 0; itr2 < arrLen-1-itr1; itr2++) {
            if (arr[itr2] > arr[itr2+1]) {
                // swap position
                let tmp = arr[itr2];
                arr[itr2] = arr[itr2+1];
                arr[itr2+1] = tmp;
                swap = true;
            }
        }

        // we add swap flag to break the loop if no swap action. no swap action
        // mean array already sorted so not necessary to continue the first loop
        if (swap == false) {
            break;
        }
    }
    return arr;
}

console.log(bubbleSort([5,4,3,2,1,6,7,8,9,10]));