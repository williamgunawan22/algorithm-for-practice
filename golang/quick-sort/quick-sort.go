package main

import "fmt"

func quickSort(arr []int) []int {
	if len(arr) < 2 {
		return arr
	}
	// take out first index for pivot
	pivot := arr[0]
	arrData := arr[1:]
	arrLen := len(arrData)
	var left, right []int
	for idx := 0; idx < arrLen; idx++ {
		if arrData[idx] <= pivot { // distribute to left part if arr equal or smaller than pivot
			left = append(left, arrData[idx])
		} else if arrData[idx] > pivot { // for the remaining, put to right side. it must be greater than pivot.
			right = append(right, arrData[idx])
		}
	}

	merge := append(quickSort(left), pivot)
	merge = append(merge, quickSort(right)...)
	return merge
}

func main() {
	result := quickSort([]int{5, 4, 3, 2, 1})
	fmt.Println("result", result)
}
