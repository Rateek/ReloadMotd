<?php

namespace rateek\reloadmotd\tasks;

use pocketmine\scheduler\Task;
use rateek\reloadmotd\Main;


class ReloadMotdTask extends Task{

    private $main;
    private $motd = 4;

    /**
     * ReloadMotdTask constructor.
     * @param Main $main
     */
    public function __construct(Main $main){
        $this->main = $main;
        
    }

    /**
     * @param int $currentTick
     */
	public function onRun(int $currentTick){
		$network = $this->main->getServer()->getNetwork();
		$config = $this->main->getConfig();
		$prefix = $config->get("reloadmotd.task.prefix");

		$this->motd--;

		if($this->motd == 3){
			$network->setName($prefix . " " . $config->get("reloadmotd.task.text.1"));

		}elseif($this->motd == 2){
			$network->setName($prefix . " " . $config->get("reloadmotd.task.text.2"));

		}elseif($this->motd == 1){
			$network->setName($prefix . " " . $config->get("reloadmotd.task.text.3"));

		}elseif($this->motd == 0){
			$this->motd = 4;

		}
	}
    
}
