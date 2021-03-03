'''
insertionSort implementation
'''
def insertionSort(arr):
    for i in range(1,len(arr)):
        j = i
        while j > 0 and arr[j] < arr[j-1]:
            swap[j, j-1, arr]
            j- = 1
    return arr


'''
bubbleSort implementation
'''
def bubbleSort(arr):
    isSorted = False
    while not isSorted:
        isSorted = True
        for i in  range(len(arr)-1):
            if arr[i] > arr[i+1]:
                swap(i,i+1,arr)
                isSorted=False
    return arr


'''
swap helper implementation
'''
def swap(i,j,arr):
    arr[i], arr[j] = arr[j] , arr[i]
