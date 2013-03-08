<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * DoublyLinkedList class implements the IDoublyLinkedList interface
 * 
 * @author Michael Cameron <m_cameron4132@fanshaweonline.ca>
 * @package Data\LinkedList
 * @version 1.0.0
 */
class DoublyLinkedList extends IDoublyLinkedList
{
    
    private $first;
    private $last;
    private $count;
 
    function __construct() {
        $this->_first = NULL;
        $this->_last = NULL;
        $this->_count = 0;
    }
    
    public function isEmpty() {
        return ($this->_first == NULL);
    }
 
    public function insertFirst($data) {
        $newLink = new ListNode($data);
 
        if($this->isEmpty()) {
            $this->_last = $newLink;
        } else {
            $this->_first->previous = $newLink;
        }
 
        $newLink->next = $this->_first;
        $this->_first = $newLink;
        $this->_count++;
    }
 
 
    public function insertLast($data) {
        $newLink = new ListNode($data);
 
        if($this->isEmpty()) {
            $this->_first = $newLink;
        } else {
            $this->_last->next = $newLink;
        }
 
        $newLink->previous = $this->_last;
        $this->_last = $newLink;
        $this->_count++;
    }
 
 
    public function insertAfter($key, $data) {
        $current = $this->_first;
 
        while($current->data != $key) {
            $current = $current->next;
 
            if($current == NULL)
                return false;
        }
 
        $newLink = new ListNode($data);
 
        if($current == $this->_last) {
            $newLink->next = NULL;
            $this->_last = $newLink;
        } else {
            $newLink->next = $current->next;
            $current->next->previous = $newLink;
        }
 
        $newLink->previous = $current;
        $current->next = $newLink;
        $this->_count++;
 
        return true;
    }
 
 
    public function deleteFirst() {
 
        $temp = $this->_first;
 
        if($this->_first->next == NULL) {
            $this->_last = NULL;
        } else {
            $this->_first->next->previous = NULL;
        }
 
        $this->_first = $this->_first->next;
        $this->_count--;
        return $temp;
    }
 
 
    public function deleteLast() {
 
        $temp = $this->_last;
 
        if($this->_first->next == NULL) {
            $this->firtNode = NULL;
        } else {
            $this->_last->previous->next = NULL;
        }
 
        $this->_last = $this->_last->previous;
        $this->_count--;
        return $temp;
    }
 
 
    public function delete($key) {
 
        $current = $this->_first;
 
        while($current->data != $key) {
            $current = $current->next;
            if($current == NULL)
                return null;
        }
 
        if($current == $this->_first) {
            $this->_first = $current->next;
        } else {
            $current->previous->next = $current->next;
        }
 
        if($current == $this->_last) {
            $this->_last = $current->previous;
        } else {
            $current->next->previous = $current->previous;
        }
 
        $this->_count--;
        return $current;
    }
 
 
    public function displayForward() {
 
        $current = $this->_first;
 
        while($current != NULL) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
    }
 
 
    public function displayBackward() {
 
        $current = $this->_last;
 
        while($current != NULL) {
            echo $current->readNode() . " ";
            $current = $current->previous;
        }
    }
 
    public function totalcount() {
        return $this->_count;
    }
 
}
}