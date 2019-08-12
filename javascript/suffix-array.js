function buildSuffixArray(str) {
    let strLen = str.length;
    let suffixes = [];
    let suffixArray = [];

    // create suffixes and unsorted suffix array
    for(let index=0; index < strLen; index++) {
        suffixes.push(str.substr(index));
        suffixArray.push(index);
    }

    // sort the suffix array
    suffixArray.sort((a,b) => {
        return (suffixes[a] < suffixes[b]) ? -1: 1;
    });

    // search using binary search
    this.search = (pattern) => {
        let left = 0;
        let right = strLen -1;
        let patternLen = pattern.length;
        while(left <= right) {
            let mid = Math.floor((left+right)/2);
            let target = suffixes[suffixArray[mid]].substr(0, patternLen);
            let cmp = pattern.localeCompare(target);

            // we are using localeCompare = strcmp to check different char has greater/lower position
            // in alphabet/ascii
            if (cmp == 0) {
                return suffixArray[mid];
            }
            // cmp have -1 value if middle different char lower than pattern char
            // so adjust to left side. 
            else if (cmp < 0) {
                right = mid-1;
            } 
            // cmp have 1 value if middle different char higher than pattern char
            // adjust to right side.
            else {
                left = mid+1;
            }
        }
        return null;
    }
}

let text = "i want to eat something delicious";
let suffixArray = new buildSuffixArray(text);
let searchStr = "delicious";
let findIndex = suffixArray.search(searchStr);
console.log("find word", text.substr(findIndex, searchStr.length), "at index", findIndex);