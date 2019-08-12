function binarySearch(arr, target) {
    let left = 0;
    let right = arr.length-1;

    // the main idea of binary search is to cut search area by adjust left or right position 
    // and check at middle position of the area. array must be sorted!
    while(left <= right) {
        let middle = Math.floor((left+right)/2);
        if (arr[middle] == target) {
            return middle;
        }
        // adjust area to left side by change right point.
        else if (arr[middle] > target) {
            right = middle-1;
        }
        // adjust area to right side by change left point. 
        else {
            left = middle+1;
        }
    }
    return null;
}

console.log("index", binarySearch([1,2,3,4,5,6,7,8,9], 8));
