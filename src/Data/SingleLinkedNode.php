<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data;

/**
 * The SingleLinkedNode interface is implemented by all nodes that are to be linked.
 *
 * @author Insu Mun <i_mun@fanshaweonline.ca>
 * @package \Data
 * @version 1.0.0
 */
class SingleLinkedNode implements \Data\ILinkedNode
{
    /**
     *
     */
    private $key;
    
    /**
     *
     */
    private $value;
    
    /**
     *
     */
    private $next;
    
    /**
     *
     */
    public function __construct(ILinkedNode $value)
    {
        if(!isset($value)) {
           throw new \InvalidArgumentException(sprintf('The value should be set.'));
        }
        $this->value = $value;
    }
    
    /**
     * Returns the key value for this node.
     *
     * @access public
     * @return mixed Returns the key value.
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
     */
    public function setKey($key)
    {
        if(!isset($key)) {
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
        return $this->value;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($value)
    {
        if(!isset($value)) {
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
        if(isset($this->next)) {
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
}