<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;

final class SpawnEgg
{
    public function __construct(private string $type) {}

    public function getItem(): Item
    {
        $egg = VanillaItems::NETHER_STAR();
        $egg->setCustomName('§r§l§d+ §eMin§fion §d+');
        $egg->setLore(array("§r§6type §7: §a$this->type")); # TODO: Level

        return $egg;
    }
}