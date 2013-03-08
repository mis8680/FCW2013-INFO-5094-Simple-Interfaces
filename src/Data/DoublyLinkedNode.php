<?php

/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedList;


/**
 * DoublyLinkedNode class implements the IDoublyLinkedNode interface
 * 
 * @author Michael Cameron <m_cameron4132@fanshaweonline.ca>
 * @package Data\LinkedList
 * @version 1.0.0
 */
class DoublyLinkedNode  implements IDoublyLinkedNode 
{
    
private $current;
private $next;
private $previous;
private $key;

public function __construct($current=null, $next=null, $previous=null){
    
    if(null !== $current) {
        $this->setValue($current);
    }
    if(null !== $next) {
        $this->setValue($next);
    }
    if(null !== $previous) {
        $this->setValue($previous);
    }
   $this->key = isset($this->_previous)?$this->_previous->getKey()+1:0;
}


/**
 * Returns the previously linked node.
 *
 * @access public
 * @return IDoublyLinkedNode|null Returns the previously linked node. Will return null
 *   if no previous node exists.
 */
public function getPrevious(){
    
return $this->_previous;
    
}

/**
* Sets the previous node.
*
* @access public
* @param IDoublyLinkedNode The previously linked node.
*/
public function setPrevious(&$previous){
    
    $this->_previous = $previous;
    while($this->_previous !== null){
        $previous->setKey(getKey()-1);
    }   
}

/**
* Returns the next ILinkedNode.
*
* @access public
* @return ILinkedNode|null Returns the next ILinkedNode instance if it exists, otherwise returns NULL.
*/
public function getNext(){
    return $this->_next;
}
    
/**
* Sets the next ILinkedNode instance.
*
* The `next` ILinkedNode should be the ILinkedNode instance that comes after
* this instance within a List.
*
* @access public
* @param ILinkedNode The ILinkedNode instance that is next.
*/
public function setNext(&$next){
  
    $this->_next=$next;
}

 /**
     * Returns the key value for this node.
     *
     * @access public
     * @return mixed Returns the key value.
     */
    public function getKey(){
        return $this->_key;
    }
    
    /**
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
     */
    public function setKey($key){
        $this->key = $key;
    }
    
    /**
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
     */
    public function getValue(){
        return $this->_current;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($current){
        $this->_current = $current;
    }
}
