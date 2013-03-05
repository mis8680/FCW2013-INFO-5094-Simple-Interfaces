<?php
/**
* This file is part of the Data package.
*
* For full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Data\LinkedLists\Tests;

/**
* @ignore
*/
require_once __DIR__ . '/../../../../src/Data/DoubleLinkedNode.php';

/**
* Double LinkedList Test class
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
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest1');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest3');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest2', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
      
      $this->assertEquals(false, $doubleLinkedList->isEmpty());
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest1'));
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest2'));
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest3'));
    }
    
    /**
* testGetFirst
*
* @access public
*/
    public function testGetFirst()
    {       
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest4');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest3', $nextDoubleLinkedNode);
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
      $this->assertEquals('nodeTest4', $doubleLinkedList->getFirst());
    }
    
    /**
* testGetLast
*
* @access public
*/
    public function testGetLast()
    {
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest5');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest6', $nextDoubleLinkedNode);
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
      $this->assertEquals($nextDoubleLinkedNode, $doubleLinkedList->getLast());
             
    }
    
    /**
* testAdd
*
* @access public
*/
    public function testAdd()
    {
      $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest6');
      
      $doubleLinkedList = new \Data\DoubleLinkedList($doubleLinkedNode);
      
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
      $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest8');
      $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest9');
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
      $doubleLinkedList->addNode($doubleLinkedNode2);
      $this->assertEquals($doubleLinkedNode2, $doubleLinkedList->getLast());
    }
    
    /**
* testAsArray
*
* @access public
*/
    public function testAsArray()
    {
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest10');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest12');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest11', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
      
      $linkedListArray = $doubleLinkedList->asArray();
      $this->assertEquals(true, is_array($linkedListArray));
      $this->assertEquals('nodeTest10', $linkedListArray[0]);
      $this->assertEquals('nodeTest11', $linkedListArray[1]);
      $this->assertEquals('nodeTest12', $linkedListArray[2]);
    }
    
    /**
* testContainsKey
*
* @access public
*/
    public function testContainsKey()
    {
       $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest');
       $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
       
       $this->assertEquals(true, $doubleLinkedList->containsKey(1));
    }
    
    /**
* testContains
*
* @access public
*/
    public function testContains()
    {
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest13');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest15');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest14', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
      
      $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
      
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest13'));
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest14'));
      $this->assertEquals(true, $doubleLinkedList->contains('nodeTest15'));
    }
    
    /**
* testFind
*
* @access public
*/
    public function testFind()
    {
       $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest16');
       $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest18');
       $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest17', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $this->assertEquals($previousDoubleLinkedNode, $doubleLinkedList->find('nodeTest16'));
        $this->assertEquals($doubleLinkedNode2, $doubleLinkedList->find('nodeTest17'));
        $this->assertEquals($nextDoubleLinkedNode, $doubleLinkedList->find('nodeTest18'));
        
    }
    
    /**
* testFindAll
*
* @access public
*/
    public function testFindAll()
    {
        
    }
    
    /**
* testFindFirst
*
* @access public
*/
    public function testFindFirst()
    {
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest19');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest20');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest20', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $this->assertEquals($nextDoubleLinkedNode, $doubleLinkedList->findFirst('nodeTest20'));

    }
    
    /**
* testFindLast
*
* @access public
*/
    public function testFindLast()
    {
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest19');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest20');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest20', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $this->assertEquals($nextDoubleLinkedNode, $doubleLinkedList->findLast('nodeTest20'));
    }
    
    /**
* testGet
*
* @access public
*/
    public function testGet()
    {
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest21');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest23');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest22', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $this->assertEquals($doubleLinkedNode, $doubleLinkedList->get(2));
    }
    
    /**
* testInsertBefore
*
* @access public
*/
    public function testInsertBefore()
    {
      $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest24');
      $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest26');
      $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest25', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $doubleLinkedList->insertBefore(1, 0, 'nodeTest27');
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest27'));
        $this->assertEquals('nodeTest27', $doubleLinkedList->getFirst());
    }
    
    /**
* testInsertAfter
*
* @access public
*/
    public function testInsertAfter()
    {
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest28');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest30');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest29', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        
        $doubleLinkedList->insertAfter(3, 4, 'nodeTest31');
        
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest31'));
        $this->assertEquals('nodeTest31', $doubleLinkedList->getLast());
    }
    
    /**
* testIsEmpty
*
* @access public
*/
    public function testIsEmpty()
    {
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest31');

        
        $doubleLinkedList= new \Data\DoubleLinkedList();
        
        $this->assertEquals(true, $doubleLinkedList->isEmpty());
        
        $doubleLinkedList->addNode($doubleLinkedNode);
        
        $this->assertEquals(false, $doubleLinkedList->isEmpty());
    }
    
    /**
* testPeek
*
* @access public
*/
    public function testPeek()
    {
           $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest32',$doubleLinkedNode2);
           $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest33');
           
           $doubleLinkedList->addNode($doubleLinkedNode);
           
           $this->assertEquals($doubleLinkedNode, $doubleLinkedList->peek());
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
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest34',$doubleLinkedNode2);
        $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest35');
           
        $doubleLinkedList->addNode($doubleLinkedNode);
           
        $this->assertEquals($doubleLinkedNode2, $doubleLinkedList->peekLast());
    }
    
    /**
* testPoll
*
* @access public
*/
    public function testPoll()
    {
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest36',$doubleLinkedNode2);
        $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest37');
           
        $doubleLinkedList->addNode($doubleLinkedNode);
           
        $this->assertEquals($doubleLinkedNode, $doubleLinkedList->poll());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest36'));
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
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest38',$doubleLinkedNode2);
        $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest39');
           
        $doubleLinkedList->addNode($doubleLinkedNode);
           
        $this->assertEquals($doubleLinkedNode2, $doubleLinkedList->pollLast());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest39'));
    }
    
    /**
* testPop
*
* @access public
*/
    public function testPop()
    {
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest40',$doubleLinkedNode2);
        $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest41');
           
        $doubleLinkedList->addNode($doubleLinkedNode);
           
        $this->assertEquals('nodeTest41', $doubleLinkedList->pop());
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest41'));
    }
    
    /**
* testPush
*
* @access public
*/
    public function testPush()
    {
        $doubleLinkedNode = new \Data\DoubleLinkedNode(1,'nodeTest42',$doubleLinkedNode2);
        $doubleLinkedNode2 = new \Data\DoubleLinkedNode(2,'nodeTest43');
           
        $doubleLinkedList->addNode($doubleLinkedNode);
        
        $doubleLinkedList->push(3,'nodeTest44');   
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest44'));
    }
    
    /**
* testRemove
*
* @access public
*/
    public function testRemove()
    {
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest44');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest46');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest45', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
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
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest47');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest49');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest48', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
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
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest50');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest52');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest51', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
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
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest53');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest55');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest54', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
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
        $previousDoubleLinkedNode = new \Data\DoubleLinkedNode(1, 'nodeTest56');
        $nextDoubleLinkedNode = new \Data\DoubleLinkedNode(3,'nodeTest58');
        $doubleLinkedNode = new \Data\DoubleLinkedNode(2,'nodeTest57', $previousDoubleLinkedNode, $nextDoubleLinkedNode);
        
        $doubleLinkedList= new \Data\DoubleLinkedList($doubleLinkedNode);
        $this->assertEquals(true, $doubleLinkedList->contains('nodeTest57'));
        $doubleLinkedList->removeNode($doubleLinkedNode2);
        $this->assertEquals(false, $doubleLinkedList->contains('nodeTest57'));
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