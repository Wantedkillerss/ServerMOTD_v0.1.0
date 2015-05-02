<?php
/*
 * ____  _       _     _               _                 ____ ____ ____  
 *|  _ \| |     | |   | |             | |               | __ \___ \___ \ 
 *| |_) | |_   _| |__ | |__   ___ _ __| |__   ___  _   _  __) |__) |__) |
 *|  _ <| | | | | '_ \| '_ \ / _ \ '__| '_ \ / _ \| | | ||__ <|__ <|__ < 
 *| |_) | | |_| | |_) | |_) |  __/ |  | |_) | (_) | |_| |___) |__) |__) |
 *|____/|_|\__,_|_.__/|_.__/ \___|_|  |_.__/ \___/ \__, |____/____/____/ 
 *                                                 __/ |                
 *                                                |___/                 
 */

namespace Blubberboy333\ServerMOTD\Main;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\command\CommandSender;
use pocektmine\command\Command;

class ServerMOTD extends PluginBase implements Listener {
	

	
	public function onEnable(){
		
	// Setting up the variables
	$motd = array("Original MOTD");
	
		$this->getLogger()->info("ServerMOTD has been loaded successfully!");
		$this->getLogger()->info(TextFormat::BLUE . "Current MOTD:" . $motd);
	}
	public function onDisable(){
		$this->getLogger()->info("ServerMOTD has been disabled successfully!");
	}
	
	//onCommand(CommandSender $sender, Command $command, $label, array $args)
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "set":
				if($sender instanceof Player && $sender->hasPermission("motd.command.set")){
					$newMOTD = $this->getPlayerMessage();
					$motd[0] = $newMOTD;
					$sender->sendMessage("You have successfully set the MOTD.");
				return true;
				}else{
					$sender->sendMessage("Error: You don't have permission to set the MOTD!");
			return false;
				}
			break;
			case "read":
				if($sender instanceof Player && $sender->hasPermission("motd.command.read")){
					if($motd != null){
						$sender->sendMessage("Today's MOTD:");
						$sender->sendMessage($motd);
					return true;
					}elseif($motd == null){
						$sender->sendMessage("There isn't a MOTD yet!");
				
					return false;
				}
				}else{
					$sender->sendMessage("You don't have permission to read the MOTD!");
				return false;
				}
			break;
			case "motd":
				if($sender instanceof Player && $sender->hasPermission("motd.command.motd")){
					$sender->sendMessage("Usage: /motd read, /motd set");
				return true;
				}
				else{
					$sender->sendMessage("You don't have permission to do that!");
			return false;
				}
			}
		}
	public function onEntityRespawnEvent(EntityRespawnEvent $event){
		if($entity instanceof Player && $entity->hasPermission("motd.command.read")){
			$entity->sendMessage("Today's MOTD:");
			$enitity->sendMessage($motd);
		}else{
			$entity->sendMessage("You don't have permission to view the MOTD!");
		}
	}
}
