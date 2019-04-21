<?php

namespace rateek\reloadmotd\events;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;

use rateek\reloadmotd\Main;

class PlayerJoin implements Listener {

	private $main;

	public function __construct(Main $main){
		$this->main = $main;
	}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();

		if($this->main->getConfig()->get("message-join") == true){
			$player->sendMessage("§bHello §3" . $player->getName() . "§b, the server uses ReloadMotd plugin by @_RATEEK");
		}
	}
}