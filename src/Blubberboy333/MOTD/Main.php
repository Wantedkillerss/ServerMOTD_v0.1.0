<?php
/*
 * 
 * Developed by Blubberboy333
 * Ask me if you need help with plugin development on Kik or PocketMine-MP
 * Kik: Blubberboy333
 * PocketMine-MP: Blubberboy333
 * 
 */

namespace Blubberboy333\MOTD\Main;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Litsener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\command\CommandSender;
use Blubberboy333\MOTD-API;

class MOTD extends PluginBase implements Litsener {
	public function onEnable(){
		
		$this->getLogger()->info("MOTD has been loaded successfully!")
	}
	public function onDisable(){
		$this->getLogger()->info("MOTD has been disabled successfully!")
	}
	
	public function onCommand(CommandSender $sender, Command $command, $commandLabel, array $args){
		case "motd":
			$sender->sendMessage("Commands: /motd set, /motd read")
			switch (strtolower(array_shift($args))) {
			case "read":
			$motd = MOTD-API::getVariable($motd);
			$sender->sendMessage($motd);
		  }
			
	}
}
