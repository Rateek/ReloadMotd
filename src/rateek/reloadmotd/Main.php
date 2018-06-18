<?php

namespace rateek\reloadmotd;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use rateek\reloadmotd\events\ReloadMotdListener;
use rateek\reloadmotd\tasks\ReloadMotdTask;


class Main extends PluginBase{

    /**
     * Enable ReloadMotd
     */
    public function onEnable(){
        # Logger
        $this->getLogger()->notice("§eReloadMotd enable.");

        # Events
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        # Tasks
        $this->getScheduler()->scheduleRepeatingTask(new ReloadMotdTask($this), 60);

        # Config
        @mkdir($this->getDataFolder());

        $this->saveDefaultConfig();
    }
    
}
