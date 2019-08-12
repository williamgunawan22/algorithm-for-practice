package main

import "fmt"

func bubbleSort(arr []int) []int {
	arrLen := len(arr)

	// the main idea of bubble sort is push the arr to the end until
	// it meet other arr with bigger value than the arr
	for itr1 := 0; itr1 < arrLen; itr1++ {
		swap := false

		for itr2 := 0; itr2 < itr1-1; itr2++ {
			for arr[itr2] > arr[itr2+1] {
				// swap position
				tmp := arr[itr2]
				arr[itr2] = arr[itr2+1]
				arr[itr2+1] = tmp
				swap = true
			}
		}

		// we add swap flag to break the loop if no swap action. no swap action
		// mean array already sorted so not necessary to continue the first loop
		if swap == false {
			break
		}
	}
	return arr
}

func main() {
	result := bubbleSort([]int{5, 4, 3, 2, 1, 6, 7, 8, 9, 10})
	fmt.Println("result", result)
}
