<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions;

use MCPE_PLUGINS\BetterMinions\minions\SpawnEgg;
use pocketmine\entity\Location;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

final class EventsHandler implements Listener
{
    public function onInteractSpawnEgg(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        $spawn_egg = new SpawnEgg();

        if (!is_null($type = $spawn_egg->getType($item))) {
            $location = Location::fromObject($event->getBlock()->getPosition()->add(0, 1, 0), $player->getWorld());
            Loader::getInstance()->minion()->spawn($type, $location, $player->getSkin());
        }
    }
}