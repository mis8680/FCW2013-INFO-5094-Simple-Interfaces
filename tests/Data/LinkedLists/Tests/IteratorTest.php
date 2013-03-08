<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *  declare namespace
 *  @ignore
 */
namespace Data\LinkedLists;
/**
 *@ignore
 */
ini_set('display_errors', 'ON');
error_reporting(E_ALL | E_STRICT);
	
    

require_once __DIR__ . '/../../src/Data/LinkedLists/Iterator.php';


/**
 *  test Iterators will implement the required unit tests using 
 *  PHPUnit?s test case framework to ensure that your Iterator class and 
 *	Iterator have absolutely no errors (runtime, compile time or logic).
 *
 * @package Data
 * @author Hiteshkumar Darji <h_darji@fanshaweonline.ca>
 * @copyright Copyright (c) 2013
 * @version 1.0
 */
class IteratorTest extends \PHPUnit_Framework_TestCase
{
    
    
    /**
     *  test initiation
     *
     *  @access public
     *  
     */    
    public function testInitiation()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
      
        $this->assertEquals(true, $it->valid());
    }
    
    /**
     * Iterator class Tests
     *
     * @access public
     */ 
    public function testNext()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
        $it->next();
        $this->assertEquals(2, $it->current());//assumes that the current key was 0
    }//end testNext
    
    /**
     * Valid method test
     *
     * @access public
     */
    public function testValid()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
        $this->assertEquals(true, $it->valid());
    }//end testValid
    
    /**
     * Key method test
     *
     * @access public
     */
    public function testKey()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
        $this->assertEquals('one', $it->key());//assumes that the current key was 0
    }
    
    /**
     * Current method test
     *
     * @access public
     */
    public function testCurrent()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
        $this->assertEquals(1, $it->current());//assumes that the current key was 0
    }
    
    /**
     * Rewind method test
     *
     * @access public
     *
     */
    public function testRewind()
    {
        $node = new \Data\LinkedLists\Iterator($this->_test);
        $it = new \Data\LinkedLists\Iterator($node);
    
        for($i = 0; $i < 10; ++$i)
        {
            $it->next();
        }//end for
        
        $this->assertEquals(false, $it->valid());
        $it->rewind();
        $this->assertEquals(true, $it->valid());
    }//end testRewind
    
}//end class
