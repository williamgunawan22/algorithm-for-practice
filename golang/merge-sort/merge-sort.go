package main

import "fmt"

func mergeSort(arr []int) []int {
	if len(arr) < 2 {
		return arr
	}

	// split array to two part
	middle := len(arr) / 2
	left := arr[:middle]
	right := arr[middle:]

	// recursion for each part until array lower than 2
	left = mergeSort(left)
	right = mergeSort(right)

	// magic happen in merge function
	return merge(left, right)
}

func merge(left []int, right []int) []int {
	leftIdx, rightIdx := 0, 0
	leftLen, rightLen := len(left), len(right)
	var result []int

	// loop for comparasion whenever left and right array index not reach the end
	for leftIdx < leftLen && rightIdx < rightLen {
		if left[leftIdx] <= right[rightIdx] {
			result = append(result, left[leftIdx])
			leftIdx++
		} else {
			result = append(result, right[rightIdx])
			rightIdx++
		}
	}

	// clean up for left part
	for leftIdx < leftLen {
		result = append(result, left[leftIdx])
		leftIdx++
	}

	// clean up for right part.
	// all array must put in the result.
	for rightIdx < rightLen {
		result = append(result, right[rightIdx])
		rightIdx++
	}

	return result
}

func main() {
	result := mergeSort([]int{5, 4, 3, 2, 1, 6, 7, 8, 9, 10})
	fmt.Println("result", result)
}
