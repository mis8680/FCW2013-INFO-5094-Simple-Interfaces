<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data;

/**
 *
 */
//require_once __DIR__ . '/bootstrap.php';

/**
 * The SingleLinkedNode interface is implemented by all nodes that are to be linked.
 *
 * @author Insu Mun <i_mun@fanshaweonline.ca>
 * @package \Data
 * @version 1.0.0
 */
class LinkedNode implements ILinkedNode
{
    /**
     * key variable
     *
     * @access private
     * @var int
     * 
     */
    private $key;
    
    /**
     * value variable
     *
     * @access private
     * @var mixed
     * 
     */
    private $value;
    
    /**
     * Node variable
     *
     * @access private
     * @var node
     */
    protected $data;
    
    /**
     * Next variable
     *
     * @access private
     * @var ILinkedNode
     */
    private $next;
    
    /**
     * construct
     *
     * @access public
     * @param Node 
     */
    public function __construct(\Data\Node $data = null, \Data\ILinkedNode $next = null)
    {

        if (!($data instanceof \Data\Node)) {
            throw new \InvalidArgumentException(sprintf('The node should be instance of Node class.'));
        }
        
        $this->key = $data->getKey();
        $this->value = $data->getValue();
        $this->node = $data;
        $this->next = $next;
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
        else {
            return null;
        }
        
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
    public function setNext(\Data\ILinkedNode $next = NULL)
    {

        $this->next = $next;

  
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
      
        if (!isset($key)) {
            throw new \InvalidArgumentException(sprintf('The key should be set.'));
        }
        $this->key = $key;
       
    }
    
    /**
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
     */
    public function getValue()
    {
        return isset($this->value) ? $this->value : null;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($value)
    {
     
        if (!isset($value)) {
            throw new \InvalidArgumentException(sprintf('The value should be set.'));
            }
            
        $this->value = $value;
        
    }
    
    /**
     * tostring method
     *
     * @access public
     * @return string $value
     */
    public function __toString()
    {
        return $this->getValue();
    }
    
    
}
