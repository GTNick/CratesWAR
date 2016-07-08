<?php
namespace CratesC;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\item\Item;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener{
	
	public $cooldown = array();
	
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getServer()->getLogger()->info("[Crates] is now Enabled");
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,array("crate-open-message" => "You just got items!","vote-key" => 0,"ultra-key" => 0,"legendary-key" => 0,"unique-key" => 0,"normal-key" => 0,"vote-key-commands" => array("givemoney {player} 1000"),"ultra-key-commands" => array("givemoney {player} 1000"),"legendary-key-commands" => array("givemoney {player} 1000"),"unique-key-commands" => array("givemoney {player} 1000"),"normal-key-commands" => array("givemoney {player} 1000"),"vote-key-items" => array(1,2,3),"ultra-key-items" => array(1,2,3),"legendary-key-items" => array(1,2,3),"unique-key-items" => array(1,2,3),"normal-key-items" => array(1,2,3)));
	}
	
	public function onInteract(\pocketmine\event\player\PlayerInteractEvent $ev){
		$p = $ev->getPlayer();
		$block = $ev->getBlock();
		$cfg = $this->config->getAll();
		if($block->getId() === 54){
			if($p->getInventory()->getItemInHand()->getId() === $cfg["vote-crate"]){
				foreach($cfg["vote-crate-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("vote-crate-commands")){
						foreach($cfg["vote-crate-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["ultra-crate"]){
				foreach($cfg["ultra-crate-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
				    if($this->config->exists("ultra-crate-commands")){
						foreach($cfg["ultra-crate-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["legendary-crate"]){
				foreach($cfg["legendary-crate-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("legendary-crate-commands")){
						foreach($cfg["legendary-crate-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["unique-crate"]){
				foreach($cfg["unique-crate-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("unique-crate-commands")){
						foreach($cfg["unique-crate-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
			if($p->getInventory()->getItemInHand()->getId() === $cfg["normal-key"]){
				foreach($cfg["normal-key-items"] as $item){
					$p->getInventory()->addItem(new Item($item,0,mt_rand(1,64)));
					$ev->setCancelled();
					$p->sendMessage($cfg["crate-open-message"]);
					if($this->config->exists("normal-key-commands")){
						foreach($cfg["normal-key-commands"] as $c){
				$cmd = str_replace("{player}", $p->getName(), $c);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), $cmd);
				}
					}
				}
			}
		}
	}
}


