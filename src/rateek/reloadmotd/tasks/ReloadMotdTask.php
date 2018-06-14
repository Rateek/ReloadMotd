<?php

namespace rateek\reloadmotd\tasks;

use pocketmine\scheduler\Task;
use rateek\reloadmotd\Main;


class ReloadMotdTask extends Task{

    private $main;
    public $motd = 4;

    /**
     * ReloadMotdTask constructor.
     * @param Main $main
     */
    public function __construct(Main $main){
        parent::__construct($main);
        $this->main = $main;
    }

    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick){
        $this->motd--;

        if($this->motd == 3){
            $this->main->getServer()->getNetwork()->setName($this->main->getConfig()->get("reloadmotd.task.prefix") . " " . $this->main->getConfig()->get("reloadmotd.task.text.1"));

        }elseif($this->motd == 2){
            $this->main->getServer()->getNetwork()->setName($this->main->getConfig()->get("reloadmotd.task.prefix") . " " . $this->main->getConfig()->get("reloadmotd.task.text.2"));

        }elseif($this->motd == 1){
            $this->main->getServer()->getNetwork()->setName($this->main->getConfig()->get("reloadmotd.task.prefix") . " " . $this->main->getConfig()->get("reloadmotd.task.text.3"));

        }elseif($this->motd == 0){
            $this->motd = 4;
            
        }
    }
    
}
