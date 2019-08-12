package main

import "fmt"

func insertionSort(arr []int) []int {
	arrLen := len(arr)

	for forwardItr := 1; forwardItr < arrLen; forwardItr++ {
		// the main idea of insertion sort is push smaller arr value to left
		// and break the loop if already reach the limit
		// so this part is the key point
		for backwardItr := forwardItr - 1; backwardItr >= 0; backwardItr-- {
			if arr[backwardItr] > arr[backwardItr+1] {
				// swap position
				tmp := arr[backwardItr]
				arr[backwardItr] = arr[backwardItr+1]
				arr[backwardItr+1] = tmp
			} else {
				break
			}
		}
	}
	return arr
}
func main() {
	result := insertionSort([]int{5, 4, 3, 2, 1, 6, 7, 8, 9, 10})
	fmt.Println("result", result)
}
