<?php

class Node{
    public $data ;
    public $left;
    public $right;

    public function __construct($data = NULL )
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

class BinaryTree{

    private  $root = null;
    public function __construct()
    {
    	$this->root = null;

    }

    public function isEmpty() {
        return $this->root === null;
    }



    public function getHeight(Node $node): int
    {
        if ($node == null){
            return 0;
        }

        $l_h = $this->getHeight($node->left);
        $r_h = $this->getHeight($node->right);
        if ($l_h > $r_h)
            return ($l_h + 1);
        else
            return ($r_h + 1);
    }


}
