<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data;

require_once __DIR__ . '/IDoublyLinkedNode.php';
require_once __DIR__ . '/LinkedNode.php';

/**
 * The DoubleLinkedNode interface is implemented by all nodes that are to be linked.
 *
 * @author Insu Mun <i_mun@fanshaweonline.ca>
 * @package \Data
 * @version 1.0.0
 */
class DoublyLinkedNode implements \Data\IDoublyLinkedNode
{
     /**
     * key variable
     *
     * @access private
     * @var int
     * 
     */
    protected $key;
    
    /**
     * value variable
     *
     * @access private
     * @var mixed
     * 
     */
    protected $value;
    
    /**
     *  next variable
     *
     *  @access private
     *  @var
     *  
     */
    private $next;
    
    /**
     * previous variable
     *
     * @access private
     * @var 
     */
    private $previous;
    
    /**
     * construct
     *
     * @access public
     * @param IDoublyLinkedNode
     */
    public function __construct(IDoublyLinkedNode $value)
    {
        if (!isset($value)) {
            throw new \InvalidArgumentException(sprintf('The value should be set.'));
        }
        $this->value = $value;
    }
    
    
    /**
     * Returns the next ILinkedNode.
     *
     * @access public
     * @return ILinkedNode|null Returns the next ILinkedNode instance if it exists, otherwise returns NULL.
     */
    public function getNext()
    {
        if (isset($this->next)) {
            return $this->next;
        }
        return false;
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
    public function setNext(ILinkedNode $next)
    {
        $this->next = $next;
    }
    
    /**
     * Returns the previously linked node.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the previously linked node. Will return null
     *   if no previous node exists.
     */
    public function getPrevious()
    {
        if (isset($this->previous)) {
            return $this->previous;
        }
        return false;
    }
    
    /**
     * Sets the previous node.
     *
     * @access public
     * @param IDoublyLinkedNode The previously linked node.
     */
    public function setPrevious(IDoublyLinkedNode &$previous)
    {
        $this->previous = $previous;
    }
    
   

    /**
     * Returns the key value for this node.
     *
     * @access public
     * @return int Returns the key value.
     */
    public function getKey()
    {
        return isset($this->key) ? $this->key : null;
    }
    
    /**
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
     */
    public function setKey($key)
    {
        if($key) {
            if (!isset($key)) {
            throw new \InvalidArgumentException(sprintf('The key should be set.'));
            }
        $this->key = $key;
        }
        
    }
    
    /**
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
     */
    public function getValue()
    {
        return isset($this->value)? $this->value : null;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($value)
    {
        if($value) {
            if (!isset($value)) {
            throw new \InvalidArgumentException(sprintf('The value should be set.'));
            }
        $this->value = $value;
        }
        
    }
}
