<?php

namespace rateek\reloadmotd\tasks;

use pocketmine\scheduler\Task;

use rateek\reloadmotd\Main;

class ReloadMotd extends Task {

	private $main;
	private $motd = 4;

	public function __construct(Main $main){
		$this->main = $main;
	}

    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick){
		$network = $this->main->getServer()->getNetwork();
		$config = $this->main->getConfig();
		$prefix = $config->get("prefix");

		$this->motd--;

		switch($this->motd){
			case 1:
				$network->setName($prefix . " " . $config->get("text.3"));
				return;
			case 2:
				$network->setName($prefix . " " . $config->get("text-2"));
				return;
			case 3:
				$network->setName($prefix . " " . $config->get("text.1"));
				return;
			default:
				$this->motd = 4;
				return;
		}
	}
}