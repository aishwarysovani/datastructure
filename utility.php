<?php

class ListNode
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
    public function readNode()
    {
        return $this->data;
    }
}
class LinkedList
{
    public $firstnode; 
    public $lastnode; 
    public $count;
    public function __construct()
    {
        $this->firstnode = null;
        $this->lastnode = null;
        $this->count = 0;
    }
    public function isEmpty()
    {
        return $this->$firstnode == null;
    }
    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstnode;
        $this->firstnode = &$link;
        if ($this->lastnode == null) 
        {
            $this->lastnode = &$link;
        }
        // if assign current obj adress to last node
        $this->count++; //count nodes
    }
    public function deleteNode1($key)
    {
        $current = $this->firstnode;
        $previous = $this->firstnode;

        while ($current->data != $key) {
            if ($current->next == null) {
                return 1;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstnode) {
            if ($this->count == 1) {
                $this->lastnode = $this->firstnode;
            }
            $this->firstnode = $this->firstnode->next;
        } else {
            if ($this->lastnode == $current) {
                $this->lastnode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
        return 0;
    }

     public function insertLast($data)
    {
        if ($this->firstnode != null) {

            $link = new ListNode($data);
            $this->lastnode->next = $link;
            $link->next = null;
            $this->lastnode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }
    public function readList()
    {
        $listData = array();
        $current = $this->firstnode;
        $i = 0;
        while ($current != null) {
            $listData[$i] = $current->readNode();
            $current = $current->next;
            $i++;
        }

        return $listData;
    }
    public function deleteNode($key)
    {
        $current = $this->firstnode;
        $previous = $this->firstnode;

        while ($current->data != $key) {
            if ($current->next == null) {
                return 1;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstnode) {
            if ($this->count == 1) {
                $this->lastnode = $this->firstnode;
            }
            $this->firstnode = $this->firstnode->next;
        } else {
            if ($this->lastnode == $current) {
                $this->lastnode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function sort()
    {
        if ($this->firstnode !== null) {
            if ($this->firstnode->next !== null) {
                for ($i = 0; $i < $this->count; $i++) {
                    $temp = null;
                    $current = $this->firstnode;
                    while ($current !== null) {
                        if ($current->next !== null && $current->data > $current->next->data) {
                            $temp = $current->data;
                            $current->data = $current->next->data;
                            $current->next->data = $temp;
                        }
                        $current = $current->next;
                    }
                }
            }
        }
    }

    

}

?>