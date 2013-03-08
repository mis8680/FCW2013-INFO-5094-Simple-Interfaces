<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * @ignore
 */
require_once __DIR__ .  '/../Iterator.php';
require_once __DIR__ .  '/../IteratorMode.php';

/**
 * The Iterator class 
 *
 * @author Insu Mun <i_mun@fanshaweonline.ca>
 * @package Data
 * @version 1.0.0
 */
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