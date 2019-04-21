<?php

namespace rateek\reloadmotd;

use pocketmine\plugin\PluginBase;

use rateek\reloadmotd\events\PlayerJoin;

use rateek\reloadmotd\tasks\ReloadMotd;

class Main extends PluginBase {

    public function onEnable(){
        if(!file_exists($this->getDataFolder() . "config.yml")){
            $this->saveResource("config.yml");
        }

        $this->registerEvents();
        $this->registerTasks();
    }

    public function registerEvents(){
        $this->getServer()->getPluginManager()->registerEvents(new PlayerJoin($this), $this);
    }

    public function registerTasks(){
        $this->getScheduler()->scheduleRepeatingTask(new ReloadMotd($this), $this->getConfig()->get("seconds") * 60);
    }
}
