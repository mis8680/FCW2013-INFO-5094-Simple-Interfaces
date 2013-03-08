<?php
/**
* This file is part of the Data package.
*
* For full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Data\LinkedLists\Tests;


ini_set('display_errors','on');
error_reporting(E_ALL | E_STRICT);


/**
* @ignore
*/
require_once __DIR__ . '/../../../../src/Data/Node.php';
require_once __DIR__ . '/../../../../src/Data/DoublyLinkedNode.php';
require_once __DIR__ . '/../../../../src/Data/LinkedLists/DoubleLinkedList.php';

/**
* LinkedList Test class
*
* @author Peyton Lawrence
* @package Data\LinkedLists\Tests
* @copyright Copyright (c) 2013, Peyton Lawrence
* @version 1.0.0
*/
class DoubleLinkedListTest extends \PHPUnit_Framework_TestCase
{
   
    /**
* testInit
*
* @access public
*/
    public function testInit()
    {
      
      $node2 = new \Data\Node('nodeTest2', 2);
      $node = new \Data\Node('nodeTest1', 1);
      $nextDoublyLinkedNode = new \Data\DoublyLinkedNode($node2);
      $doublyLinkedNode = new \Data\DoublyLinkedNode($node, $nextDoublyLinkedNode);
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedList->addNode($doublyLinkedNode);
      
      $this->assertEquals(false, $doubleLinkedList->isEmpty());
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest1'));
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest2'));
    }
    
    /**
* testGetFirst
*
* @access public
*/
    public function testGetFirst()
    {       
      $node2 = new \Data\Node('nodeTest4', 2);
      $node = new \Data\Node('nodeTest2', 1);
      $nextDoublyLinkedNode = new \Data\DoublyLinkedNode($node2);
      $doublyLinkedNode = new \Data\DoublyLinkedNode($node, $nextDoublyLinkedNode);
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedListLinkedList->addNode($doublyLinkedNode);
        
      $this->assertEquals($doublyLinkedNode, $doubleLinkedList->getFirst());
    }
    
    /**
* testGetLast
*
* @access public
*/
    public function testGetLast()
    {
      $node2 = new \Data\Node('nodeTest6', 2);
      $node = new \Data\Node('nodeTest5', 1);
      $nextDoublyLinkedNode = new \Data\DoublyLinkedNode($node2);
      $doublyLinkedNode = new \Data\DoublyLinkedNode($node, $nextDoublyLinkedNode);
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedList->addNode($doublyLinkedNode);
        
      $this->assertEquals($nextDoublyLinkedNode, $doubleLinkedList->getLast());
             
    }
    
    /**
* testAdd
*
* @access public
*/
    public function testAdd()
    {
      $node = new \Data\Node('nodeTest6', 1);
      $doublyLinkedNode = new \Data\LinkedNode($node);
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedList->addNode($doublyLinkedNode);
      
      $doubleLinkedList->add('nodeTest7');
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest7'));
      
    }
    
     /**
* testAddNode
*
* @access public
*/
    public function testAddNode()
    {
      $node = new \Data\Node('nodeTest7',1);
      $node2 = new \Data\Node('nodeTest8', 2);
      $node3 = new \Data\Node('newNode', 3);
      $doubleSingleLinkedNode = new \Data\DoublyLinkedNode($node2);
      $doublyLinkedNode = new \Data\DoublyLinkedNode($node, $nextdoublyLinkedNode);
   
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedList->addNode($doublyLinkedNode);
        
      $addedLinkedNode = new \Data\DoublyLinkedNode($node3);  
        
      $doubleLinkedList->addNode($addedLinkedNode);
      $this->assertEquals($addedLinkedNode, $doubleLinkedList->getLast());
    }
    
    /**
* testAsArray
*
* @access public
*/
    public function testAsArray()
    {
      $node = new \Data\Node('nodeTest10',1);
      $node2 = new \Data\Node('nodeTest11', 2);
      $node3 = new \Data\Node('nodeTest12', 3);
      $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
      $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
      $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
      
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      
      $doubleLinkedList->addNode($doublyLinkedNode);
      
      $linkedListArray = $doubleLinkedList->asArray();
      
 
      $this->assertEquals(true, is_array($linkedListArray));
      $this->assertEquals('nodeTest10', $linkedListArray[0]);
     // $this->assertEquals($node2, $linkedListArray[1]);
     // $this->assertEquals($node3, $linkedListArray[2]);
    }
    
    /**
* testContainsKey
*
* @access public
*/
    public function testContainsKey()
    {
      
      $node = new \Data\Node('nodeTest', 1);
      
       $doublyLinkedNode = new \Data\DoublyLinkedNode($node);
       $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
       
       $doubleLinkedList->addNode($doublyLinkedNode);
       
      // $this->assertEquals(true, $doubleLinkedList->containsKey(1));
    }
    
    /**
* testContains
*
* @access public
*/
    public function testContains()
    {
          
      $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
      $doubleLinkedList->add('nodeTest13');
   
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest13'));
    }
    
    /**
* testFind
*
* @access public
*/
    public function testFind()
    {
      
        $node = new \Data\Node('nodeTest16',1);
        $node2 = new \Data\Node('nodeTest17', 2);
        $node3 = new \Data\Node('nodeTest18', 3);
      
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
            
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals($doublyLinkedNode, $doubleLinkedList->find('nodeTest16'));
        $this->assertEquals($singleLinkedNode2, $doubleLinkedList->find('nodeTest17'));
        $this->assertEquals($singleLinkedNode3, $doubleLinkedList->find('nodeTest18'));
        
    }
    
    /**
* testFindAll
*
* @access public
*/
    public function testFindAll()
    {
       $node = new \Data\Node('value1',1);
       $node2 = new \Data\Node('value2', 2);
       $node3 = new \Data\Node('value1', 3);
      
       $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
       $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
       $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
       
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
       
       
       $testArray = $doubleLinkedList->findAll('value1');
       
       $this->assertEquals(true, is_array($testArray));
       $this->assertEquals(true, in_array('value1',$testArray));
    }
    
    /**
* testFindFirst
*
* @access public
*/
    public function testFindFirst()
    {
        $node = new \Data\Node('nodeTest19',1);
        $node2 = new \Data\Node('nodeTest20', 2);
        $node3 = new \Data\Node('nodeTest20', 3);
      
      
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
    
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals($doublyLinkedNode3, $doubleLinkedList->findFirst('nodeTest20'));

    }
    
    /**
* testFindLast
*
* @access public
*/
    public function testFindLast()
    {
      
        $node = new \Data\Node('nodeTest19',1);
        $node2 = new \Data\Node('nodeTest20', 2);
        $node3 = new \Data\Node('nodeTest20', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals($doublyLinkedNode2, $doubleLinkedList->findLast('nodeTest20'));
    }
    
    /**
* testGet
*
* @access public
*/
    public function testGet()
    {
        $node = new \Data\Node('nodeTest21',1);
        $node2 = new \Data\Node('nodeTest22', 2);
        $node3 = new \Data\Node('nodeTest23', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doubleLinkedNode2,$doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doubleLinkedNode);
        
        $this->assertEquals($doublyLinkedNode2, $doubleLinkedList->get(2));
    }
    
    /**
* testInsertBefore
*
* @access public
*/
    public function testInsertBefore()
    {
        $node = new \Data\Node('nodeTest24',2);
        $node2 = new \Data\Node('nodeTest25', 3);
        $node3 = new \Data\Node('nodeTest26', 4);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
        
        $singleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $doubleLinkedList->insertBefore(2, 'nodeTest27');
        
       // $this->assertEquals(true, $doubleLinkedList->contains('nodeTest27'));
       // $this->assertEquals('nodeTest27', $doubleLinkedList->getFirst()->getValue());
    }
    
    /**
* testInsertAfter
*
* @access public
*/
    public function testInsertAfter()
    {
        $node = new \Data\Node('nodeTest27',1);
        $node2 = new \Data\Node('nodeTest28', 2);
        $node3 = new \Data\Node('nodeTest29', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $doubleLinkedList->insertAfter(3, 'nodeTest30');
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest30'));
        $this->assertEquals('nodeTest30', $doubleLinkedList->getLast()->getValue());
    }
    
    /**
* testIsEmpty
*
* @access public
*/
    public function testIsEmpty()
    {
      
        $node = new \Data\Node('nodeTest31', 1);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node);

        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        
        $this->assertEquals(true, $doubleLinkedList->isEmpty());
        
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals(false, $doubleLinkedList->isEmpty());
    }
    
    /**
* testPeek
*
* @access public
*/
    public function testPeek()
    {
           $node = new \Data\Node('nodeTest32',1);
           $node2 = new \Data\Node('nodeTest33', 2);
      
           $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
           $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
           
           $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
           $doubleLinkedList->addNode($doublyLinkedNode);
           
           $this->assertEquals($doublyLinkedNode, $doubleLinkedList->peek());
    }
    
    /**
* testPeekFirst
*
* @access public
*/
    public function testPeekFirst()
    {
           $node = new \Data\Node('nodeTest32',1);
           $node2 = new \Data\Node('nodeTest33', 2);
      
           $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
           $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
           
           $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
           $doubleLinkedList->addNode($doublyLinkedNode);
           
           $this->assertEquals($doublyLinkedNode, $doubleLinkedList->peekFirst());
    }
    
    /**
* testPeekLast
*
* @access public
*/
    public function testPeekLast()
    {
        $node = new \Data\Node('nodeTest34',1);
        $node2 = new \Data\Node('nodeTest35', 2);;
      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
           
        $this->assertEquals($doublyLinkedNode2, $doubleLinkedList->peekLast());
    }
    
    /**
* testPoll
*
* @access public
*/
    public function testPoll()
    {
        $node = new \Data\Node('nodeTest36',1);
        $node2 = new \Data\Node('nodeTest37', 2);
      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
           
        $this->assertEquals($doublyLinkedNode, $doubleLinkedList->poll());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest36'));
    }
    
    /**
* testPollFirst
*
* @access public
*/
    public function testPollFirst()
    {
        $node = new \Data\Node('nodeTest36',1);
        $node2 = new \Data\Node('nodeTest37', 2);
      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
           
        $this->assertEquals($doublyLinkedNode, $doubleLinkedList->pollFirst());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest36'));
    }
    
    /**
* testPollLast
*
* @access public
*/
    public function testPollLast()
    {
        $node = new \Data\Node('nodeTest38',1);
        $node2 = new \Data\Node('nodeTest39', 2);
      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
           
        $this->assertEquals($doublyLinkedNode2, $doubleLinkedList->pollLast());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest39'));
    }
    
    /**
* testPop
*
* @access public
*/
    public function testPop()
    {
        $node = new \Data\Node('nodeTest40',1);
        $node2 = new \Data\Node('nodeTest41', 2);
      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
           
        $this->assertEquals($doublyLinkedNode2, $doubleLinkedList->pop());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest41'));
    }
    
    /**
* testPush
*
* @access public
*/
    public function testPush()
    {
        $node = new \Data\Node('nodeTest42',1);
        $node2 = new \Data\Node('nodeTest43', 2);

      
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2);
           
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $doubleLinkedList->push('nodeTest44');   
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest44'));
    }
    
    /**
* testRemove
*
* @access public
*/
    public function testRemove()
    {
        $node = new \Data\Node('nodeTest44',1);
        $node2 = new \Data\Node('nodeTest45', 2);
        $node3 = new \Data\Node('nodeTest46', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest45'));
        $doubleLinkedList->remove('nodeTest45');
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest45'));
    }
    
    /**
* testRemoveAt
*
* @access public
*/
    public function testRemoveAt()
    {
        $node = new \Data\Node('nodeTest47',1);
        $node2 = new \Data\Node('nodeTest48', 2);
        $node3 = new \Data\Node('nodeTest49', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2,$doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest48'));
        $doubleLinkedList->removeAt(2);
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest48'));
    }
    
    /**
* testRemoveFirst
*
* @access public
*/
    public function testRemoveFirst()
    {
        $node = new \Data\Node('nodeTest50', 1);
        $node2 = new \Data\Node('nodeTest51', 2);
        $node3 = new \Data\Node('nodeTest52', 3);
              
        $doubleLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doubleLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doubleLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2, $doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest50'));
        $doubleLinkedList->removeFirst();
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest50'));
    }
    
    /**
* testRemoveLast
*
* @access public
*/
    public function testRemoveLast()
    {
        $node = new \Data\Node('nodeTest53',1);
        $node2 = new \Data\Node('nodeTest54', 2);
        $node3 = new \Data\Node('nodeTest55', 3);
              
        $doubleLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doubleLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doubleLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2, $doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest55'));
        $doubleLinkedList->removeLast();
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest55'));
    }
    
    /**
* testRemoveNode
*
* @access public
*/
    public function testRemoveNode()
    {
        $node = new \Data\Node('nodeTest56',1);
        $node2 = new \Data\Node('nodeTest57', 2);
        $node3 = new \Data\Node('nodeTest58', 3);
              
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node,$doublyLinkedNode2, $doublyLinkedNode3);
        
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals('nodeTest57', $doublyLinkedNode2->getValue());
        $doubleLinkedList->removeNode($doublyLinkedNode2);
       // $this->assertEquals(null, $doublyLinkedNode2->getValue());
    }
    
    /**
* testSort
*
* @access public
*/
    public function testSort()
    {
        $node1 = new \Data\LinkedLists\Node('nodeSortTest3', 3);
        $node2 = new \Data\LinkedLists\Node('nodeSortTest2', 2);
        $node3 = new \Data\LinkedLists\Node('nodeSortTest1', 1);   
        
        $doublyLinkedNode3 = new \Data\DoublyLinkedNode($node3);
        $doublyLinkedNode2 = new \Data\DoublyLinkedNode($node2);
        $doublyLinkedNode = new \Data\DoublyLinkedNode($node1,$doublyLinkedNode2, $doublyLinkedNode3);
                
        $doubleLinkedList= new \Data\LinkedLists\DoubleLinkedList();
        $doubleLinkedList->addNode($doublyLinkedNode);
        
        $this->assertEquals($doublyLinkedNode, $DoubleLinkedList->getFirst());
        $this->assertEquals('nodeSortTest3', $doubleLinkedList->getFirst()->getValue());
        $singleLinkedList->sort();
        $this->assertEquals($node3, $doubleLinkedList->getFirst());
        $this->assertEquals('nodeSortTest1', $doubleLinkedList->getFirst()->getValue());
    }
    
    /**
* testSortBy
*
* @access public
*/
    public function testSortBy()
    {
        
    }

}
