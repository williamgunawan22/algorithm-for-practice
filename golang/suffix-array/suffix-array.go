package main

import (
	"fmt"
	"index/suffixarray"
)

// type Suffix struct {
// 	index  int
// 	suffix string
// }

// type SuffixSorter []Suffix

// func (a SuffixSorter) Len() int           { return len(a) }
// func (a SuffixSorter) Swap(i, j int)      { a[i], a[j] = a[j], a[i] }
// func (a SuffixSorter) Less(i, j int) bool { return a[i].suffix < a[j].suffix }

// func buildSuffixArray(str string) func(key string) int {
// 	strLen := len(str)
// 	var suffixes []Suffix
// 	for idx := 0; idx < strLen; idx++ {
// 		suffixes = append(suffixes, Suffix{idx, str[:idx+1]})
// 	}

// 	suffixes = sort.Sort(SuffixSorter(suffixes))
// 	fmt.Println("suffixes", suffixes)
// 	return func(key string) int {
// 		return 1
// 	}
// }

func main() {
	str := []byte("pepaya terlalu manis buat dimakan langsung")
	suffixArray := suffixarray.New(str)
	fmt.Println("search", suffixArray.Lookup([]byte("ma"), 1))
}
