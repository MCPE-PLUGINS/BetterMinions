<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions\type;

use MCPE_PLUGINS\BetterMinions\minions\MinionBase;
use pocketmine\entity\Human;
use pocketmine\entity\Location;
use pocketmine\entity\Skin;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\nbt\tag\CompoundTag;

final class Miner extends Human
{
    use MinionBase;

    const TYPE = 'Miner';

    private int $level;

    public function __construct(Location $location, Skin $skin, ?CompoundTag $nbt = null)
    {
        parent::__construct($location, $skin, $nbt);
    }

    public function getLevel(): int
    {
        return $this->getLevel();
    }
}