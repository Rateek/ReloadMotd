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

		switch($this->motd){
			case 1:
				$network->setName($prefix . " " . $config->get("reloadmotd.task.text.3"));
				return;
			case 2:
				$network->setName($prefix . " " . $config->get("reloadmotd.task.text.2"));
				return;
			case 3:
				$network->setName($prefix . " " . $config->get("reloadmotd.task.text.1"));
				return;
			default:
				$this->motd = 4;
				return;
		}
	}

}
