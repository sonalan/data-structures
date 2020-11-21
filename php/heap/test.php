<?php
include "Heap.php";
$heap = new Heap();

$heap->push(3);
$heap->push(9);
$heap->push(4);
$heap->push(10);
$heap->push(5);
$heap->push(17);
$heap->push(2);
print_r($heap->getItems());
$heap->pop();

print_r($heap->getItems());
