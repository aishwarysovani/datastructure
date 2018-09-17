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
        
        $this->count++; 
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

    public function readListInList()
    {
        $current = $this->firstnode;
        while ($current != null) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
        echo "\n";
    }
    public function addToFile($filename)
    {
        $fh = fopen($filename, 'a');
        $current = $this->firstnode;
        while ($current != null) {
            $Data = $current->readNode() . " ";
            fwrite($fh, $Data);
            $current = $current->next;
        }
        fclose($fh);
        echo "\n";
    }
    
    public function getInt()
    {
        $num = readline();
        if (filter_var($num, FILTER_VALIDATE_INT) && (preg_match('/[0-9]/', $num))) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
}


class Stack
{
    public $top;
    public $stackArray = array();
    public function __construct()
    {
        $this->top = -1;
    }
    public function push($element)
    {
        $this->top = $this->top + 1;
        $this->stackArray[$this->top] = $element;
    }
    public function pop()
    {
        if ($this->isEmpty()) {
            return true;
        }
        $this->top = $this->top - 1;
        return false;

    }
    public function isEmpty()
    {
        if ($this->top == -1) {

            return true;
        }
        return false;
    }
    
}


class Element
{
    public $value;
    public $next;

}

class Queue
{
    private $front = null;
    private $back = null;
    private $totalammount = 20000000;
    public function isEmpty()
    {
        return $this->front == null;
    }

    public function getInt()
    {
        $num = readline();
        if (filter_var($num, FILTER_VALIDATE_INT) && (preg_match('/[0-9]/', $num))) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    public function enqueue($name)
    {
        $oldBack = $this->back;
        $this->back = new Element();
        $this->back->value = $name;
        if ($this->isEmpty()) {
            $this->front = $this->back;
        } else {
            $oldBack->next = $this->back;
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $removedValue = $this->front->value;
        echo "person name : " . $removedValue . "\n";
        echo "enter the operation 1: deposite , 2 : withdraw , 3 :check balance \n";
        $operation = $this->getInt();
        if ($operation == 1 || $operation == 2) {
            echo "enter the amount \n";
            $amount = $this->getInt();
        } else {
            $amount = 0;
        }

        $this->cash($amount, $operation);
        $this->front = $this->front->next;
    }
    public function cash($amount, $operation)
    {
        switch ($operation) {
            case 1:
                $this->totalammount = $this->totalammount + $amount;
                echo "Deposited " . $amount . " into bank \n";
                break;
            case 2:
                if ($amount <= $this->totalammount) {
                    $this->totalammount = $this->totalammount - $amount;
                    echo "Withdrawn " . $amount . " from bank \n";
                } else {
                    echo "Sorry no cash in bank ,see you next time \n";
                }

                break;
            default:
                echo "bank cash amount available is : " . $this->totalammount . "\n";
                break;
        }
    }
}


class Node
{
    public $value;
    public $next;
    public $prev;
    public function __construct($data)
    {
        $this->value=$data;
        $this->next=null;
        $this->prev=null;
    }

}

class Dqueue
{
    private $front = null;
    private $back = null;
    private $size = 0;
    
    public function isEmpty()
    {
        return $this->front == null;
    }
    public function insertFirst($data)
    {
        $newobj = new Node($data);
        if($this->front == null)
        $this->back = $this->front = $newobj;
        else{
            $newobj->next=$this->front;
            $this->front->prev=$newobj;
            $this->front=$newobj;
        }
        $this->size++;
    }
    public function insertLast($data)
    {
        $newobj = new Node($data);
        if($this->back == null)
        $this->back = $this->front = $newobj;
        else{
            $newobj->back=$this->$back;
            $this->back->next=$newobj;
            $this->back=$newobj;
        }
        $this->size++;
    }
    public function deleteFront()
    {
        $temp =$this->front;
        $this->front=$this->front->next;
        if($this->front==null)
        $this->back=null;
        else
        $this->front->prev=null;
        $this->size--;
        return $temp->value;
    }
    public function deleteLast()
    {
        $temp =$this->back;
        $this->back=$this->back->prev;
        if($this->back==null)
        $this->front=null;
        else
        $this->back->next=null;
        $this->size--;
        return $temp->value;
    }
    public function getFront()
    {
        if($this->isEmpty())
        return null;
        echo "first value = " . $this->front->value . "\n";
    }
    public function getLast()
    {
        if($this->isEmpty())
        return null;
        echo "first value = " . $this->back->value . "\n";
    }
}

//function to calculate prime number
function prime($t)
{
    if($t<=1)
      return false;
    for($i=2;$i<=sqrt($t);$i++)
    {
        if($t%$i==0)
        {
          return false;
        }
    }
    return true;
}


//function for find out day of week
function day($month,$day,$year) {
    $y = $year - floor((14 - $month) / 12);
    $y=(int)$y;
    $x = $y + floor($y/4) - floor($y/100) + floor($y/400);
    $x=(int)$x;
    $m = $month + (12 * floor((14 - $month) / 12)) - 2;
    $m=(int)$m;
    $d = ($day + $x + floor((31*$m)/12)) % 7;
    $d=(int)$d;
    return $d;
}

//class for deque
class node1  {
	public $next;
    public $key;
}
class queue1 {
	private $front = null;
    private $back = null;
 public function isEmpty()
    {
        return $this->front == null;
    }

function  Dqueue() {
	if ($this->isEmpty()) {
		return null;
	}
	$value = $this->front->key;
	$this->front = $this->front->next;
	return $value;
}
function  Enqueue($data) {
    $old= $this->back;
	$this->back = new node1();
    $this->back->key=$data;
	if ($this->isEmpty()) {
		$this->front =$this->back;
	} else {
		$old->next = $this->back;
	}
}
}



//function for leap year
function isLeapYear($year) {
    if  (($year % 4 == 0) && ($year % 100 != 0)) 
        return true;
    if  ($year % 400 == 0) 
        return true;
    return false;
}



//function for queue in stack calender class
class node2 {
	public $next;
    public $element;
}
class Stack1 {
	private $front=null;
    private $back=null;

function push($data){
    $old=$this->back;
    $this->back= new node2();
    $this->back->element=$data;
	if ($this->isEmpty()) {
		$this->front = $this->back;
	} else {
        $old->next = $this->back;
	}
	return true;

}

function pop() {
	if($this->isEmpty()) {
		return null;
	}
	$value = $this->front->element;
	$this->front = $this->front->next;
	return $value;
}

public function isEmpty()
{
    return $this->front == null;
}
}
?>