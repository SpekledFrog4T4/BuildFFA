<?php

namespace SpekledFrog\buildffa;


use SpekledFrog\buildffa\Main;
use pocketmine\scheduler\Task;
use pocketmine\block\Block;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\block\BlockFactory;

class BlockTask extends Task {


   public $main;
   public $block;

   public function __construct(Main $main, Block $block){

      $this->main = $main;
      $this->block = $block;
   }
  

    public function onRun(int $CurrentTick){
       $this->block->getLevel()->setBlock($this->block, Block::get(0));  //this change the block into air when the timer runs down


    }


}
