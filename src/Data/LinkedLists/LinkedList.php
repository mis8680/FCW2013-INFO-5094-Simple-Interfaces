<?php

/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;


ini_set('display_errors','on');
error_reporting(E_ALL | E_STRICT);

/**
 * required file 
 */
require_once __DIR__ . '/../bootstrap.php';

/**
 * The Single Linked List.
 *
 * @author Insu Mun <i_mun@fanshaweonline.ca>
 * @package Data
 * @version 1.0.0
 */
class LinkedList implements \Data\LinkedLists\ILinkedList
{
    /**
     * first node
     *
     * @access private
     * @var ILinkedNode
     */
    private $firstNode;
    
    /**
     * To count the node data
     *
     * @access private
     * @var double
     */
    private $count;
    
    /**
     * construct method
     *
     * @access public
     * 
     */
    public function __construct()
    {
        $this->firstNode = null;
        $this->count = 0;
       
    }
    
    
    /**
     * count the size of list
     *
     * @access public
     * @return double
     * 
     */
    public function count()
    {
        return $this->count;
    }
    
    /**
     * Get Iterator method
     *
     * @access public
     * @return Iterator
     */
    public function getIterator()
    {
        return new \Data\LinkedLists\Iterator($this);
    }
    
    /**
     * Returns the first element in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the first ILinkedNode in the list, otherwise returns NULL.
     */
    public function getFirst()
    {
        return ($this->firstNode == null) ? null : $this->firstNode;
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the last ILinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        if ($this->getFirst() != null) {
            $current = $this->getFirst();
            while ($current->getNext() !== null) {
                $current = $current->getNext();
                if ($current->getNext() == null) {
                    return $current;
                }             
            }
            return NULL;
            
        }
        
    }
    
    /**
     * Adds a value onto the end of the list.
     *
     * This method will create a new ILinkedNode instance assigning a
     * numeric key value to the node and the value is assigned to the
     * node's value property.
     *
     * @access public
     * @param mixed $value The value to add.
     * @return int The key value of the node that was created and added.
     */
    public function add($value)
    {
        
        $current = $this->firstNode;
        
        if($this->isEmpty() || $this->count == 0) {
            $this->firstNode = new \Data\LinkedNode(new \Data\Node($value), null);
            $current = $this->firstNode;
            $current->setKey(0);
        } else {
            for($i = 0 ; $i < $this->count() - 1 ; ++$i) {
                $current = $current->getNext();               
            }
            $newNode = new \Data\LinkedNode(new \Data\Node($value, $this->count()), null);
            $current->setNext($newNode);
            $current = $current->getNext();
        }
        
        ++$this->count;     
        $key = $current->getKey();
        
        return $key;
        
    }
    
    /**
     * Adds an ILinkedNode instance onto the end of the list.
     *
     * The node that is to be added to the list should have its key reset so that
     * it is the next key in the list's key sequence.
     *
     * @access public
     * @param ILinkedNode $node The ILinkedNode to add.
     * @return mixed The key value of the node that was added.
     */
    public function addNode(\Data\ILinkedNode $node)
    {
        $current = $this->firstNode;
        
        if($this->isEmpty() || $this->count == 0) {
            $this->firstNode = $node;
            $current = $this->firstNode;
            $current->setKey(0);
        } else {
            $current = $this->getLast();
            $nextKey = $current->getKey();
            $current->setNext($node);
            $current = $current->getNext();
            $current->setKey($nextKey + 1);
            
        }
        ++$this->count;
        $key = $current->getKey();
        
        return $key;
    }
    
    /**
     * Returns the list as an associative array.
     *
     * The return array will be formatted so that each node within the list
     * will be returned as a key => value representation. 
     *
     * @access public
     * @return array An associative array of key and value pairs for all nodes.
     */
    public function asArray()
    {
        $listArray = array();
        
        $current = $this->firstNode;
 
        while($current != NULL)
        {
            $listArray[$current->getKey()] = $current->getValue();
            $current = $current->getNext();
        }
        
        return $listArray;
    }
    
    /**
     * Checks if the list contains a node with the specified key value.
     *
     * @access public
     * @param mixed $key Contains the key value to search for.
     * @return bool Returns true if the $key was found, otherwise returns false.
     */
    public function containsKey($key)
    {
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getKey() == $key) {
                return true;
            }
            $current = $current->getNext();
        }
        return false;
    }
    
    /**
     * Checks if the list contains a node with the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to search for.
     * @return bool Returns true if the $value was found, otherwise returns false.
     */
    public function contains($value)
    {
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getValue() == $value) {
                return true;
            }
            $current = $current->getNext();
        }
        return false;
    }
    
    /**
     * Returns the ILinkedNode object by the specified value.
     * 
     * @access public
     * @param mixed $value Contains the value to find.
     * @return ILinkedNode|null Returns the first ILinkedNode that contains the value, otherwise null.
     */
    public function find($value)
    {
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getValue() == $value) {
                return $current;
            }
            $current = $current->getNext();
        }
        return null;
    }
    
    /**
     * Returns an array of all ILinkedNodes found by the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return array|null Returns an array with all the ILinkedNode instances whose value is equal to $value, otherwise returns null.
     */
    public function findAll($value)
    {
        $listArray = array();
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getValue() == $value) {
                $listArray[$current->getKey()] = $current->getValue();
            }
            $current = $current->getNext();
        }
        return isset($listArray) ? $listArray : null;
    }
    
    /**
     * Returns the first ILinkedNode instance found by with the specified value.
     * 
     * @access public
     * @param mixed $value
     * @return ILinkedNode|null Returns the last ILinkedNode that contains the value, otherwise null if none found.
     */
    public function findFirst($value)
    {
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getValue() == $value) {
                return $current;
            }
            $current = $current->getNext();
        }
        return null;
    }
    
    /**
     * Returns the last ILinkedNode instance found by the specified value.
     *
     * The searching operations for this method are in reverse, therefore starting at the
     * bottom of the list. This is done so on purpose to reduce unneeded overhead.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return ILinkedNode|null Returns the last ILinkedNode that contains the value, otherwise null if none found.
     */
    public function findLast($value)
    {
        $current = $this->firstNode;
        $lastNode;
        
        while($current != NULL) {
            if($current->getValue() == $value) {
                $lastNode = $current;
            }
            $current = $current->getNext();
        }
        return isset($lastNode) ? $lastNode : null;
    }
    
    /**
     * Returns the ILinkedNode at the specified $key.
     *
     * @access public
     * @param mixed Contains the key of the ILinkedNode to get.
     * @return mixed Returns the ILinkedNode at $key if found, otherwise null.
     */
    public function get($key)
    {
        $current = $this->firstNode;
        
        while($current != NULL) {
            if($current->getKey() == $key) {
                return $current;
            }
            $current = $current->getNext();
        }
        return null;
    }
    
    /**
     * Inserts a new ILinkedNode at before the specified key.
     *
     * The ILinkedNode instance is created within this method. When inserting, all nodes should
     * be shifted and key values shifted as well for all nodes that follow this newly inserted.
     * Additionally, when inserting a new ILinkedNode, the key will be automatically generated as the
     * next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $before Contains the key value to insert a new ILinkedNode before.
     * @param mixed $value Contains the value used to create a new ILinkedNode with and inserted before $before.
     * @return int Returns the newly create ILinkedNode's key.
     */
    public function insertBefore($before, $value)
    {
        $current = $this->firstNode;
        
        $newNode = new \Data\LinkedNode(new \Data\Node($value));
        
        if($before == 0) {
            $this->firstNode = $newNode;
            $newNode->setKey(0);
            $newNode->setNext($current);

            $afterNewNode = $newNode->getNext();
            while($afterNewNode != NULL) {
                        $afterNewNode->setKey($afterNewNode->getKey() + 1);
                        $afterNewNode = $afterNewNode->getNext();
                    }
            
        } else {
            while($current != NULL) {
                      
                if($current->getKey() + 1 == $before) {
                                   
                    $newNode->setNext($current->getNext());
                    $newNode->setKey($current->getKey() + 1);
                    $current->setNext($newNode);
                    
                    
                    $afterNewNode = $newNode->getNext();
                    
                    while($afterNewNode != NULL) {
                        $afterNewNode->setKey($afterNewNode->getKey() + 1);
                        $afterNewNode = $afterNewNode->getNext();
                    }
                    
                    
                    
                }
            
            $current = $current->getNext();
                    
            }
        }
    
        ++$this->count;     
        $key = $newNode->getKey();
        
        return $key;
    }
    
    /**
     * Inserts a new ILinkedNode after the specified key.
     *
     * The ILinkedNode instance is created within this method. When inserting, all nodes that are
     * to follow (come after) this node should be shifted and key values shifted as well.
     * Additionally, when inserting a new ILinkedNode, the key will be automatically generated
     * the next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $after Contains the key value to insert a new ILinkedNode after.
     * @param mixed $value Contains the value used to create a new ILinkedNode with and inserted before $after.
     * @return int Returns the newly create ILinkedNode's key.
     */
    public function insertAfter($after, $value)
    {
        $current = $this->firstNode;
        
        $newNode = new \Data\LinkedNode(new \Data\Node($value));
        
        
        while($current != NULL) {
                      
            if($current->getKey() == $after) {
                                  
                $newNode->setNext($current->getNext());
                $newNode->setKey($current->getKey() + 1);
                $current->setNext($newNode); 
                    
                    
                $afterNewNode = $newNode->getNext();
                    
                while($afterNewNode != NULL) {
                    $afterNewNode->setKey($afterNewNode->getKey() + 1);
                    $afterNewNode = $afterNewNode->getNext();
                }
                                     
            }
            
            $current = $current->getNext();
                    
            
        }
    
        ++$this->count;     
        $key = $newNode->getKey();
        
        return $key;
    }
    
    /**
     * Returns a boolean to represent whether or not this list is empty.
     *
     * @access public
     * @return bool Returns true if the list is empty, otherwise returns false.
     */
    public function isEmpty()
    {
        return $this->count == 0 ? true : false;
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        return isset($this->firstNode) ? $this->getFirst() : NULL;
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peekFirst()
    {
        return isset($this->firstNode) ? $this->getFirst() : NULL;
    }
    
    /**
     * Returns, but does not remove, the last node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the last node in the list. Will returns NULL if the list empty.
     */
    public function peekLast()
    {
        $current = $this->firstNode;
        $lastNode;
        
        while($current != NULL) {
            if($current->getNext() == NULL) {
                return $current;
            }
            $current = $current->getNext();
        }
        return NULL;
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function poll()
    {
        if(isset($this->firstNode)) {
            $pollFirstNode = $this->firstNode;
            $this->firstNode = $pollFirstNode->getNext();
            
            $current = $this->firstNode;
            while($current != NULL) {
                $current->setKey($current->getKey() - 1);
                $current = $current->getNext();
            }
            --$this->count;
            return $pollFirstNode;
        }
        return NULL;
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function pollFirst()
    {
        if(isset($this->firstNode)) {
            $pollFirstNode = $this->firstNode;
            $this->firstNode = $pollFirstNode->getNext();
            
            $current = $this->firstNode;
            while($current != NULL) {
                $current->setKey($current->getKey() - 1);
                $current = $current->getNext();
            }
            --$this->count;
            return $pollFirstNode;
        }
        return NULL;
    }
    
    /**
     * Returns and removes the last node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the last node in the list. Will return NULL if the list is empty.
     */
    public function pollLast()
    {
        $pollLastNode;
        $current = $this->firstNode;
        
        if(isset($current)){
            while($current != NULL) {
                if($current->getNext()->getNext() == NULL) {
                    $pollLastNode = $current->getNext();
                    $current->setNext();
                    --$this->count;
                    return $pollLastNode;
                }
                $current = $current->getNext();
            }
        }
        return NULL;
    }
    
    /**
     * Returns the last node's value and removes the last node in the list.
     *
     * @access public
     * @return mixed Returns the last node value in the list. Will return NULL if the list empty.
     */
    public function pop()
    {
        $popNode;
        $current = $this->firstNode;
        
        if(isset($current)){
            while($current != NULL) {
                if($current->getNext()->getNext() == NULL) {
                    $popNode = $current->getNext();
                    $current->setNext();
                    return $popNode->getValue();
                }
                $current = $current->getNext();
            }
        }
        return NULL;
    }
    
    /**
     * Adds a new value onto the end of the list.
     *
     * A new ILinkedNode instance will be created and the value assigned to the specified. A numeric
     * key will be created based on the sequence (last numeric key + 1) and assigned to this node.
     *
     * @access public
     * @param mixed Contains the value to push onto the list.
     */
    public function push($value)
    {
        $lastNode = $this->getLast();
        
        $newNode = new \Data\LinkedNode(new \Data\Node($value));
        
        $lastNode->setNext($newNode);
        $newNode->setKey($lastNode->getKey() + 1);
        
        ++$this->count;     
    }
    
    /**
     * Removes all nodes whose value is equal to that specified.
     *
     * Will remove all nodes within the list in addition to shifting and adjusting their
     * keys, for those that are within a numeric sequence.
     *
     * @access public
     * @param mixed Contains the value to remove.
     */
    public function remove($value)
    {
        if($this->isEmpty()) {
            return null;
        }
        
        $previous = $this->firstNode;
        $current = $this->firstNode;
            
        while($current != NULL) {
            
            if($current->getValue() == $value) {
                if($current->getKey() == 0){
                    $this->firstNode = $current->getNext();
                    $current->setNext();
                    $current = $this->firstNode;
                    $current->setKey(0);
                    --$this->count;
                                      
                    $afterRemove = $current->getNext();
                    while($afterRemove != NULL) {
                        $afterRemove->setKey($afterRemove->getKey() - 1);
                        $afterRemove = $afterRemove->getNext();
                    }
                } elseif ($current === $this->getLast()) {
                    $previous->setNext();
                    --$this->count;
                } else {
                    $previous->setNext($current->getNext());
                    $current->setNext();
                    $current = $previous->getNext();
                    --$this->count;
                    
                    $afterRemove = $current;
                    while($afterRemove != NULL) {
                        $afterRemove->setKey($afterRemove->getKey() - 1);
                        $afterRemove = $afterRemove->getNext();
                    }
                }
                
            }
            $previous = $current;
            $current = $current->getNext();
        }
    }
    
     /**
     * Removes the node that lives at the specified key.
     *
     * Will remove the node at $key within the list in addition to shifting and adjusting the keys for
     * remaining nodes that follow the removed.
     *
     * @access public
     * @param mixed Contains the value to remove.
     */
    public function removeAt($key)
    {
        if($this->isEmpty()) {
            return null;
        }
        
        $previous = $this->firstNode;
        $current = $this->firstNode;
            
        while($current != NULL) {
            
            if($current->getKey() == $key) {
                if($current->getKey() == 0){
                    $this->firstNode = $current->getNext();
                    $current->setNext();
                    $current = $this->firstNode;
                    $current->setKey(0);
                    --$this->count;
                                      
                    $afterRemove = $current->getNext();
                    while($afterRemove != NULL) {
                        $afterRemove->setKey($afterRemove->getKey() - 1);
                        $afterRemove = $afterRemove->getNext();
                    }
                } elseif ($current === $this->getLast()) {
                    $previous->setNext();
                    --$this->count;
                } else {
                    $previous->setNext($current->getNext());
                    $current->setNext();
                    $current = $previous->getNext();
                    --$this->count;
                    
                    $afterRemove = $current;
                    while($afterRemove != NULL) {
                        $afterRemove->setKey($afterRemove->getKey() - 1);
                        $afterRemove = $afterRemove->getNext();
                    }
                }
                
            }
            $previous = $current;
            $current = $current->getNext();
        }
    }
    
    /**
     * Removes the first node from the list.
     *
     * @access public
     */
    public function removeFirst()
    {
        if($this->isEmpty()) {
            return null;
        }
        
        $current = $this->firstNode;
        
        
        $this->firstNode = $current->getNext();
        $current->setNext();
        $current = $this->firstNode;
        $current->setKey(0);
        --$this->count;
                                      
        $afterRemove = $current->getNext();
        while($afterRemove != NULL) {
            $afterRemove->setKey($afterRemove->getKey() - 1);
            $afterRemove = $afterRemove->getNext();
        }
                
    }
    
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        if($this->isEmpty()) {
            return null;
        }
        
        $current = $this->firstNode;
        $lastNode = $this->getLast(); 
        
        while($current != NULL) {
            if($current->getNext() === $lastNode) {
                $current->setNext();
                --$this->count;
            }
            $current = $current->getNext();
        }
       
    }
    
    /**
     * Removes the specified node from the list.
     *
     * If the node exists, it will be removed and all nodes that follow will be shifted and their keys
     * will be adjusted.
     *
     * @access public
     * @param ILinkedNode $node The node to remove from the list.
     */
    public function removeNode(\Data\ILinkedNode $node)
    {
        if($this->isEmpty()) {
            return null;
        }
        
        $this->remove($node->getValue());
    }
    
    /**
     * Sorts the list by the node values.
     *
     * The keys of all moved nodes will be adjusted so that the numeric key sequence
     * remains (n - 1) + 1 for all nodes.
     *
     * @access public
     */
    public function sort()
    {
        
        if($this->isEmpty()) {
            return null;
        } 
        
        $current = $this->firstNode;

        for($i = 0 ; $i < $this->count() ; ++$i) {
            while($current->getNext() != NULL) {
                if($current->getValue() > $current->getNext()->getValue()) {
                    $temp = $current->getValue();
                    $current->setValue($current->getNext()->getValue());
                    $current->getNext()->setValue($temp);
                    
                    $current = $current->getNext();
                } else {
                    $current = $current->getNext();
                }
            }
            $current = $this->firstNode;
           
        }
    
    }
    
    /**
     * Sorts the list by using a callback to specify the value to compare on.
     *
     * The callback should take one parameter of type ILinkedNode and return a single
     * value that will be used for comparison.
     *
     * @access public
     * @param $predicate callable 
     * 
     */
    public function sortBy(callable $predicate)
    {
         
            if($this->isEmpty()) {
                return null;
            } 
        
            $current = $this->firstNode;
            
            for($i = 0 ; $i < $this->count() ; ++$i) {
                while($current->getNext() != NULL) {
                    $comparison = $predicate($current, $current->getNext());
                    
                    if($comparison == 1) {
                        $temp = $current->getValue();
                        $current->setValue($current->getNext()->getValue());
                        $current->getNext()->setValue($temp);
                        
                        $current = $current->getNext();
                    } else {
                        $current = $current->getNext();
                    }
                }
                
                $current = $this->firstNode;
               
            }
        
        
              
    }
    
    /**
     * callback function
     *
     * @access public
     * @param ILinkedNode
     * @return mixed value
     *
     *   so ... sort by take a callback (a name of a function) that performs the sort
     *   this function takes 2 parameters - the lhs and rhs, both of LinkedNodes
     *   and returns an int. if lhs < rhs, -1 is returned. if ==, then 0, else +1
     *   and this function is called when comparing 2 linkednode objects
     *   and the returned value of the function is hwat is used for determining the operation needed to be performed, if any, by linkedlist
     *
     */
    public static function my_callback(\Data\ILinkedNode $current, \Data\ILinkedNode $next)
    {
        if($current->getNext() != NULL){
            if($current->getValue() < $next->getValue()) {
                return -1;
            } elseif ($current->getValue() == $next->getValue()) {
                return 0;
            } else {
                return 1;
            }
        }
        
    }

}



$test = new \Data\LinkedLists\LinkedList();
print 'count of list: '.$test->count() . '<br />';
print 'first key: '.$test->add('test0'). '<br />';

print 'count of list: '.$test->count() . '<br />';
print 'second key: ' . $test->add('test2'). '<br />';

print 'count of list: '.$test->count() . '<br />';
print 'third key: ' . $test->add('test1'). '<br />';

print 'count of list: '.$test->count() . '<br />';

$node1 = new \Data\Node('test5');
print 'fourth key: ' . $test->addNode(new \Data\LinkedNode($node1)) . '<br />';

print_r($test->asArray());

print '<br />';
print $test->containsKey(5) ? 'true' : 'false';

print '<br />';
print $test->find('test2');

print '<br />';
$testArray = $test->findAll('test2');
print_r($testArray);

print '<br />';
print $test->add('test4'). '<br />';
print $test->add('test3'). '<br />';
$test->insertBefore(0, 'testInsert before index 0');
print_r($test->asArray());

print '<br />';
$test->insertAfter(0, 'testInsert after index 0');
print_r($test->asArray());

print '<br />';
$test->poll();
print_r($test->asArray());

print '<br />';
$test->pollLast();
print_r($test->asArray());

print '<br />';
$test->pop();
print_r($test->asArray());

print '<br />';
$test->push('push test');
print_r($test->asArray());

print '<br />';
print '<br />';
print_r($test->asArray());
$test->sortBy(array($test, 'my_callback'));
print '<br />';
print_r($test->asArray());
/*
print '<br />';
$test->remove('test2');
print_r($test->asArray());

print '<br />';
$test->removeAt(1);
print_r($test->asArray());

print '<br />';
$test->removeFirst();
print_r($test->asArray());

print '<br />';
$test->removeLast();
print_r($test->asArray());
*/