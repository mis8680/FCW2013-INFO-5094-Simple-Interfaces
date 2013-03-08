<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace Data\LinkedLists;

/**
 * @package Data
 * @author Hiteshkumar Darji <h_darji@fanshaweonline.ca>
 * @copyright Copyright (c) 2013
 * @version 1.0
 */
 
 
class Iterator implements \Iterator
{
	/**
     * keep track of the mode
     *
     * @access private
     * @var mode
     */
	private $mode;
	private $firstNode;
	private $lastNode;
	private $current;
	
	/**
     * construct method
     *
     * @access public
     * @param data $data
     * 
     */
	 public function __construct(\Data\LinkedLists\Iterator $mode = null)
    {
		if ($mode) {
            if (!is_numeric($mode)) {
                throw new \InvalidArgumentException(sprintf('The data should a numeric data.'));
            }
           
        }
        
        $this->rewind();
    
    }
    
    /**
     * Returns the current value.
     *
     * @access public
     * @return Returns the current value at position.
     */
    public function current()
    {
        
        return $this->current;
    }

    }
    
 
    public function next()
    {
       if(($this->IteratorMode::FIFO) == IteratorMode::FIFO)
	   {
			if(($this->IteratorMode::KEEP) == IteratorMode::KEEP)
			{
				return $this->mode;
			}
			else if($this->IteratorMode::DELETE) == IteratorMode::DELETE)
			{
				$temp = $this->firstNode;
				$this->firstNode = $this->firstNode->next;
				if($this->firstNode != NULL)
				$this->current--;
 
				return $temp;
			}
	   }
	   else if(($this->IteratorMode::LIFO) == IteratorMode::LIFO)
	   {
		   $this->current = $this->current->getNext();
		   
		   if(($this->IteratorMode::KEEP) == IteratorMode::KEEP)
			{
				return $this->mode;
				
			}
			else if($this->IteratorMode::DELETE) == IteratorMode::DELETE)
			{
				if($this->firstNode != NULL)
				{
					if($this->firstNode->next == NULL)
					{
						$this->firstNode = NULL;
						$this->current--;
					}
					else
					{
						$previousNode = $this->firstNode;
						$currentNode = $this->firstNode->next;
 
						while($currentNode->next != NULL)
						{
							$previousNode = $currentNode;
							$currentNode = $currentNode->next;
						}
 
						$previousNode->next = NULL;
						$this->current--;
					}
				}
			}
	   }

    }
	
	public function getMode()
	{
		return $this->mode;
	}
	
	public function setMode($mode)
	{
		$this->mode = mode;
	}
   
    /**
     * Returns the key from the current node.
     *
     * @access public
     * 
     */
     public function key()
    {
        return $this->current->getKey();
    }

    
     /**
     * Returns the current position to firstNode.
     *
     * @access public
     * 
     */
	public function rewind()
    {
        $this->current = $this->firstNode;
    }
    
	 /**
     * Returns a boolean value of to check next object value.
     *
     * @access public
     * 
     */
	 public function valid()
    {
        return $this->current->getNext() != NULL;
    }


 
 