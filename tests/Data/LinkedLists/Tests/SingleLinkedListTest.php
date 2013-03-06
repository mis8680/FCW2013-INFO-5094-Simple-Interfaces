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
require_once __DIR__ . '/../../../../src/Data/LinkedNode.php';
require_once __DIR__ . '/../../../../src/Data/LinkedLists/LinkedList.php';

/**
* Double LinkedList Test class
*
* @author Peyton Lawrence
* @package Data\LinkedLists\Tests
* @copyright Copyright (c) 2013, Peyton Lawrence
* @version 1.0.0
*/
class SingleLinkedListTest extends \PHPUnit_Framework_TestCase
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
      $nextSingleLinkedNode = new \Data\LinkedNode($node2);
      $singleLinkedNode = new \Data\LinkedNode($node, $nextSingleLinkedNode);
      
      $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
      
      $this->assertEquals(false, $singleLinkedList->isEmpty());
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest1'));
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest2'));
    }
    
    /**
* testGetFirst
*
* @access public
*/
    public function testGetFirst()
    {       
      $node2 = new \Data\Node('nodeTest4',2);
      $node = new \Data\Node('nodeTest3',1);
      $nextSingleLinkedNode = new \Data\LinkedNode($node2);
      $singleLinkedNode = new \Data\LinkedNode($node, $nextSingleLinkedNode);
      
       $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
        
      $this->assertEquals($singleLinkedNode, $singleLinkedList->getFirst());
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
      $nextSingleLinkedNode = new \Data\LinkedNode($node2);
      $singleLinkedNode = new \Data\LinkedNode($node, $nextSingleLinkedNode);
      
       $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
        
      $this->assertEquals($nextSingleLinkedNode, $singleLinkedList->getLast());
             
    }
    
    /**
* testAdd
*
* @access public
*/
    public function testAdd()
    {
      $node = new \Data\Node('nodeTest6', 1);
      $singleLinkedNode = new \Data\LinkedNode($node);
      
       $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
      
      $singleLinkedList->add('nodeTest7');
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest7'));
      
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
      $nextSingleLinkedNode = new \Data\LinkedNode($node2);
      $singleLinkedNode = new \Data\LinkedNode($node, $nextSingleLinkedNode);
   
      
      $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
        
      $addedLinkedNode = new \Data\LinkedNode($node3);  
        
      $singleLinkedList->addNode($addedLinkedNode);
      $this->assertEquals($addedLinkedNode, $singleLinkedList->getLast());
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
      $singleLinkedNode3 = new \Data\LinkedNode($node3);
      $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
      $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
      
       $singleLinkedList= new \Data\LinkedLists\LinkedList();
      
      $singleLinkedList->addNode($singleLinkedNode);
      
      $linkedListArray = $singleLinkedList->asArray();
      
 
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
      
       $singleLinkedNode = new \Data\LinkedNode($node);
       $singleLinkedList= new \Data\LinkedLists\LinkedList();
       
       $singleLinkedList->addNode($singleLinkedNode);
       
      // $this->assertEquals(true, $singleLinkedList->containsKey(1));
    }
    
    /**
* testContains
*
* @access public
*/
    public function testContains()
    {
          
      $singleLinkedList= new \Data\LinkedLists\LinkedList();
      $singleLinkedList->add('nodeTest13');
   
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest13'));
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
      
       $singleLinkedNode3 = new \Data\LinkedNode($node3);
       $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
       $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
            
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
       $this->assertEquals($singleLinkedNode, $singleLinkedList->find('nodeTest16'));
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->find('nodeTest17'));
        $this->assertEquals($singleLinkedNode3, $singleLinkedList->find('nodeTest18'));
        
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
        $node3 = new \Data\Node('value3', 3);
      
       $singleLinkedNode3 = new \Data\LinkedNode($node3);
       $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
       $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
       
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
       
       
       $testArray = $singleLinkedList->findAll('value1');
       
       $this->assertEquals(true, is_array($testArray));
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
      
      
       $singleLinkedNode3 = new \Data\LinkedNode($node3);
       $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
       $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
    
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->findFirst('nodeTest20'));

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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode3, $singleLinkedList->findLast('nodeTest20'));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->get(2));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $singleLinkedList->insertBefore(2, 'nodeTest27');
        
       // $this->assertEquals(true, $singleLinkedList->contains('nodeTest27'));
       // $this->assertEquals('nodeTest27', $singleLinkedList->getFirst()->getValue());
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $singleLinkedList->insertAfter(3, 'nodeTest30');
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest30'));
        $this->assertEquals('nodeTest30', $singleLinkedList->getLast()->getValue());
    }
    
    /**
* testIsEmpty
*
* @access public
*/
    public function testIsEmpty()
    {
      
        $node = new \Data\Node('nodeTest31', 1);
        $singleLinkedNode = new \Data\LinkedNode($node);

        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        
        $this->assertEquals(true, $singleLinkedList->isEmpty());
        
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals(false, $singleLinkedList->isEmpty());
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
      
           $singleLinkedNode2 = new \Data\LinkedNode($node2);
           $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
           
           
           $singleLinkedList= new \Data\LinkedLists\LinkedList();
           $singleLinkedList->addNode($singleLinkedNode);
           
           $this->assertEquals($singleLinkedNode, $singleLinkedList->peek());
    }
    
    /**
* testPeekFirst
*
* @access public
*/
    public function testPeekFirst()
    {
        
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
      
        $singleLinkedNode2 = new \Data\LinkedNode($node2);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
           
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->peekLast());
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
      
        $singleLinkedNode2 = new \Data\LinkedNode($node2);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
           
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
           
        $this->assertEquals($singleLinkedNode, $singleLinkedList->poll());
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest36'));
    }
    
    /**
* testPollFirst
*
* @access public
*/
    public function testPollFirst()
    {

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
      
        $singleLinkedNode2 = new \Data\LinkedNode($node2);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
           
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
           
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->pollLast());
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest39'));
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
      
        $singleLinkedNode2 = new \Data\LinkedNode($node2);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
           
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
           
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->pop());
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest41'));
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

      
        $singleLinkedNode2 = new \Data\LinkedNode($node2);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
           
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $singleLinkedList->push('nodeTest44');   
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest44'));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest45'));
        $singleLinkedList->remove('nodeTest45');
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest45'));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest48'));
        $singleLinkedList->removeAt(2);
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest48'));
    }
    
    /**
* testRemoveFirst
*
* @access public
*/
    public function testRemoveFirst()
    {
        $node = new \Data\Node('nodeTest50',1);
        $node2 = new \Data\Node('nodeTest51', 2);
        $node3 = new \Data\Node('nodeTest52', 3);
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest50'));
        $singleLinkedList->removeFirst();
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest50'));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest55'));
        $singleLinkedList->removeLast();
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest55'));
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
              
        $singleLinkedNode3 = new \Data\LinkedNode($node3);
        $singleLinkedNode2 = new \Data\LinkedNode($node2,$singleLinkedNode3);
        $singleLinkedNode = new \Data\LinkedNode($node,$singleLinkedNode2);
        
        $singleLinkedList= new \Data\LinkedLists\LinkedList();
        $singleLinkedList->addNode($singleLinkedNode);
        
        $this->assertEquals('nodeTest57', $singleLinkedNode2->getValue());
        $singleLinkedList->removeNode($singleLinkedNode2);
       // $this->assertEquals(null, $singleLinkedNode2->getValue());
    }
    
    /**
* testSort
*
* @access public
*/
    public function testSort()
    {
        
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