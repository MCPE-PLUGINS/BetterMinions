<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions;

use MCPE_PLUGINS\BetterMinions\minions\type\Miner;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;

final class SpawnEgg
{
    public function getItem(string $type): Item
    {
        $egg = VanillaItems::NETHER_STAR();
        $egg->setCustomName('§r§l§d+ §eMin§fion §d+');
        $egg->setLore(array("§r§6type §7: §a$type")); # TODO: Level

        return $egg;
    }

    public function getType(Item $item): ?string
    {
        foreach (array(Miner::TYPE) as $type) {
            $spawn_egg = $this->getItem($type);
            if ($item->equals($spawn_egg)) {
                return $type;
            }
        }

        return null;
    }
}