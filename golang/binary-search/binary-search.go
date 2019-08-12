package main

import (
	"fmt"
	"math"
)

func binarySearch(arr []int, target int) int {
	left := 0
	right := len(arr) - 1

	// the main idea of binary search is to cut search area by adjust left or right position
	// and check at middle position of the area. array must be sorted!
	for left <= right {
		middle := int(math.Ceil(float64(left+right) / float64(2)))
		// if match then return the array index
		if arr[middle] == target {
			return middle
		} else if arr[middle] > target { // adjust area to left side by change right point.
			right = middle - 1
		} else { // adjust area to right side by change left point.
			left = middle + 1
		}
	}
	return -1
}

func main() {
	result := binarySearch([]int{1, 2, 3, 4, 6, 7, 8, 9, 10}, 8)
	fmt.Println("result", result)
}
