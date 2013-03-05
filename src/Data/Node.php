<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data;

//require_once __DIR__ . '/INode.php';

/**
 * Node class implemented by INode
 *
 * @author Insu Mun<mis8680@gmail.com>
 * @package Data
 * @version 1.0.0
 */
class Node implements \Data\INode
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
     * Constructor
     *
     * @access public
     * @param int $key
     * @param mixed $value
     * 
     */
    public function __construct($value = null, $key = null)
    {
        $this->setKey($key);
        $this->setValue($value);
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
