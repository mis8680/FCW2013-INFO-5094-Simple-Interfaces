<?php

require_once __DIR__ .  '/../Iterator.php';
require_once __DIR__ .  '/../IteratorMode.php';

class Iterator implements \Iterator
{
    private $list;
    private $position;
    private $mode;
    
    public function __construct(\Data\LinkedLists\ILinkedList $list, $mode = 0)
    {
        if(!$mode) {
            $mode = IteratorMode::KEEP | IteratorMode::FIFO;
        }
        
        $this->list = $list;
        $this->mode = $mode;
    }
}