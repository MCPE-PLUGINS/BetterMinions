<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions;

use MCPE_PLUGINS\BetterMinions\minions\type\Miner;
use pocketmine\entity\Human;
use pocketmine\entity\Location;
use pocketmine\entity\Skin;

final class MinionHandler
{
    public function spawn(string $type, Location $location, Skin $skin): ?Human
    {
        $minion = match($type) {
            Miner::TYPE => new Miner($location, $skin),
            default => null
        };

        if (!is_null($minion)) {
            $minion->spawnToAll();
        }

        return $minion;
    }
}