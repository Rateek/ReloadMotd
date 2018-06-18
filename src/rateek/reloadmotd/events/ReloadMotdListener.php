<?php

namespace rateek\reloadmotd\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use rateek\reloadmotd\Main;

class ReloadMotdListener implements Listener{

	private $main;

	/**
	 * ReloadMotdListener constructor.
	 * @param Main $main
	 */
	public function __construct(Main $main){
		$this->main = $main;
	}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();

		if($this->main->getConfig()->get("reloadmotd.message.join") == true){
			$player->sendMessage("§bHello §3" . $player->getName() . "§b, The server uses ReloadMotd by @Rateek_");
		}
	}
}