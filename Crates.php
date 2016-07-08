<?php

namespace CrazierDevotee0\Crates;

use pocketmine\plugin\PluginBase;

class Crates extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("Crates has been Enabled!");
    }

    public function onDisable(){
        $this->getLogger()->info("Crates has been Disabled!");
    }
}
