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
require_once __DIR__ . '/../../../../src/Data/SingleLinkedNode.php';

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
      $nextSingleLinkedNode = new \Data\SingleLinkedNode(2,'nodeTest2');
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest1', $nextSingleLinkedNode);
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
      
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
      $nextSingleLinkedNode = new \Data\SingleLinkedNode(2,'nodeTest4');
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest3', $nextSingleLinkedNode);
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
      $this->assertEquals('nodeTest4', $singleLinkedList->getFirst());
    }
    
    /**
* testGetLast
*
* @access public
*/
    public function testGetLast()
    {
      $nextSingleLinkedNode = new \Data\SingleLinkedNode(2,'nodeTest5');
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest6', $nextSingleLinkedNode);
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
      $this->assertEquals($nextSingleLinkedNode, $singleLinkedList->getLast());
             
    }
    
    /**
* testAdd
*
* @access public
*/
    public function testAdd()
    {
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest6');
      
      $singleLinkedList = new \Data\SingleLinkedList($singleLinkedNode);
      
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
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest8');
      $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest9');
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
      $singleLinkedList->addNode($singleLinkedNode2);
      $this->assertEquals($singleLinkedNode2, $singleLinkedList->getLast());
    }
    
    /**
* testAsArray
*
* @access public
*/
    public function testAsArray()
    {
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest10',$singleLinkedNode2);
      $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest11',$singleLinkedNode3);
      $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest12');
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
      
      $linkedListArray = $singleLinkedList->asArray();
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
       $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest');
       $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
       
       $this->assertEquals(true, $singleLinkedList->containsKey(1));
    }
    
    /**
* testContains
*
* @access public
*/
    public function testContains()
    {
      $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest13',$singleLinkedNode2);
      $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest14',$singleLinkedNode3);
      $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest15');
      
      $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
      
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest13'));
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest14'));
      $this->assertEquals(true, $singleLinkedList->contains('nodeTest15'));
    }
    
    /**
* testFind
*
* @access public
*/
    public function testFind()
    {
       $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest16',$singleLinkedNode2);
       $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest17',$singleLinkedNode3);
       $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest18');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
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
        
    }
    
    /**
* testFindFirst
*
* @access public
*/
    public function testFindFirst()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest19',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest20',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest20');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->findFirst('nodeTest20'));

    }
    
    /**
* testFindLast
*
* @access public
*/
    public function testFindLast()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest19',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest20',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest20');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode3, $singleLinkedList->findLast('nodeTest20'));
    }
    
    /**
* testGet
*
* @access public
*/
    public function testGet()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest21',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest22',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest23');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
        $this->assertEquals($singleLinkedNode2, $singleLinkedList->get(2));
    }
    
    /**
* testInsertBefore
*
* @access public
*/
    public function testInsertBefore()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest24',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest25',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest26');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
        $singleLinkedList->insertBefore(1, 0, 'nodeTest27');
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest27'));
        $this->assertEquals('nodeTest27', $singleLinkedList->getFirst());
    }
    
    /**
* testInsertAfter
*
* @access public
*/
    public function testInsertAfter()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest27',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest28',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest29');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        
        $singleLinkedList->insertAfter(3, 4, 'nodeTest30');
        
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest30'));
        $this->assertEquals('nodeTest30', $singleLinkedList->getLast());
    }
    
    /**
* testIsEmpty
*
* @access public
*/
    public function testIsEmpty()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest31');

        
        $singleLinkedList= new \Data\SingleLinkedList();
        
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
           $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest32',$singleLinkedNode2);
           $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest33');
           
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest34',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest35');
           
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest36',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest37');
           
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest38',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest39');
           
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest40',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest41');
           
        $singleLinkedList->addNode($singleLinkedNode);
           
        $this->assertEquals('nodeTest41', $singleLinkedList->pop());
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest41'));
    }
    
    /**
* testPush
*
* @access public
*/
    public function testPush()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest42',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest43');
           
        $singleLinkedList->addNode($singleLinkedNode);
        
        $singleLinkedList->push(3,'nodeTest44');   
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest44'));
    }
    
    /**
* testRemove
*
* @access public
*/
    public function testRemove()
    {
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest44',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest45',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest46');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest47',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest48',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest49');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest50',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest51',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest52');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest53',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest54',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest55');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
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
        $singleLinkedNode = new \Data\SingleLinkedNode(1,'nodeTest56',$singleLinkedNode2);
        $singleLinkedNode2 = new \Data\SingleLinkedNode(2,'nodeTest57',$singleLinkedNode3);
        $singleLinkedNode3 = new \Data\SingleLinkedNode(3,'nodeTest58');
        
        $singleLinkedList= new \Data\SingleLinkedList($singleLinkedNode);
        $this->assertEquals(true, $singleLinkedList->contains('nodeTest57'));
        $singleLinkedList->removeNode($singleLinkedNode2);
        $this->assertEquals(false, $singleLinkedList->contains('nodeTest57'));
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