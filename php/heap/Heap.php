<?php

class Heap{

    /**
     * @var array
     */
    private $items=[];

    /**
     * @var int
     */
    private $capasity = 10;

    /**
     * @var int
     */
    private $size = 0;

    /**
     * @var string
     */
    private $heap_type ;


    public function __construct(string $heap_type = "MIN", array  $items=NULL)
    {
        $this->heap_type = $heap_type;

        $this->items = array_fill(0, $this->capasity, null);

        if($items && is_array($items)) {
            $this->items= $items;
            $this->size = sizeof($items);
        }

    }

    /**
     * @return int
     */
    public function get_size(): int{

        return $this->size;
    }

    /**
     * @return int
     */
    public function peek():int{
        if($this->size === 0){
            throw  new Exception("Heap is empty");
        }
        return $this->items[0];
    }

    public function push(int $i){
        $this->ensureExtraCapacity();
        $this->items[$this->size] = $i;
        $this->size++;
        $this->heapifyUp();
    }

    public function pop(){
        if($this->size === 0){
            throw  new Exception("Heap is empty");
        }
        $item = $this->items[0];
        $this->items[0] = $this->items[$this->size -1];
        $this->items[$this->size -1]=null;
        $this->size--;
        $this->heapifyDown();
        return $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }



    /**
     * @param int $i
     * @return int
     */
    private function parentIndex(int $i): int {
        return  (int)(($i -1)/2);
    }

    /**
     * @param int $i
     * @return int
     */
    private function leftIndex(int $i): int
    {
        return  (2 * $i + 1);
    }

    /**
     * @param int $i
     * @return int
     */
    private function rightIndex(int $i): int
    {
        return  (2 * $i + 2);
    }

    /**
     * @param int $i
     * @return bool
     */
    private function hasParent(int $i)
    {
        return $this->parentIndex($i) >= 0 ;
    }

    /**
     * @param int $i
     * @return bool
     */
    private function hasLeftChild(int $i)
    {
        return $this->leftIndex($i) < $this->size;
    }

    /**
     * @param int $i
     * @return bool
     */
    private function hasRightChild(int $i)
    {
        return $this->rightIndex($i) < $this->size ;
    }

    /**
     * @param int $i
     * @return mixed
     */
    private function parent(int $i)
    {
        return $this->items[$this->parentIndex($i)];
    }

    /**
     * @param int $i
     * @return mixed
     */
    private function leftChild(int $i)
    {
        return $this->items[$this->leftIndex($i)];
    }

    /**
     * @param int $i
     * @return mixed
     */
    private function rightChild(int $i)
    {
        return $this->items[$this->rightIndex($i)];
    }

    private function swap(int $index1, int $index2)
    {
        $temp = $this->items[$index1];

        $this->items[$index1] = $this->items[$index2];
        $this->items[$index2] = $temp;
    }

    private function ensureExtraCapacity()
    {
        if($this->size == $this->capasity){
            $this->items[]= array_merge($this->items, array_fill(0, $this->capasity, null));
            $this->capasity *= 2;
        }
    }

    public function heapifyUp()
    {
        $index = $this->size - 1;
        while ($this->hasParent($index) && $this->parent($index) > $this->items[$index]){
            $this->swap($this->parentIndex($index), $index);
            $index = $this->parentIndex($index);
        }
    }


    private function heapifyDown(){

        $index = 0;
        while($this->hasLeftChild($index)){
            $smallerChildIndex = $this->leftIndex($index);
            if($this->hasRightChild($index) && $this->rightChild($index) < $this->leftChild($index))
            {
                $smallerChildIndex = $this->rightIndex($index);
            }

            if($this->items[$index] < $this->items[$smallerChildIndex])
            {
                break;
            } else {
                $this->swap($index,$smallerChildIndex);
            }
            $index= $smallerChildIndex;
        }

    }



}
