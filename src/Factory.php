<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions;

use MCPE_PLUGINS\BetterMinions\minions\type\Miner;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\Human;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;

final class Factory
{
    private const MINIONS = array(
        Miner::class => Miner::TYPE
    );

    public static function registerMinions(): void
    {
        foreach (self::MINIONS as $minion_class => $minion_name) {
            EntityFactory::getInstance()->register($minion_class, static function (World $world, CompoundTag $nbt) use ($minion_class): Human {
                return new $minion_class(EntityDataHelper::parseLocation($nbt, $world), Human::parseSkinNBT($nbt));
            }, [$minion_name]);
        }
    }
}