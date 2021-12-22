<?php

namespace SpekledFrog\buildffa;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\block\BlockFactory;

class Main extends PluginBase implements Listener {
  
   public function onEnable(){
   	  $this->getlogger()->info("plugin Enabled");
   	  $this->getServer()->getPluginManager()->registerEvents($this, $this);

   }

   public function onDisable(){
   	  $this->getlogger()->info("plugin Disabled");
   }

   public function onPlace(BlockPlaceEvent $event){
   	  $block = $event->getBlock();
   	if($block->getId() == 24){  //24 is the id of the block
   	   $event->setCancelled();

       $world = $block->getLevel();
       $world->setBlock($block, BlockFactory::get(id: 24, meta: 0, pos: null));
       $this->getScheduler()->scheduleDelayedTask(new BlockTask($this, $block), delay: 20 * 5);  //5 is the time that the blocks will disappear

   	}

   }
 }

