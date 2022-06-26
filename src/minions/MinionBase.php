<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;

trait MinionBase
{
    protected function initEntity(CompoundTag $nbt): void
    {
        parent::initEntity($nbt);

        $this->level = $nbt->getInt('level', 1);
        $this->setNameTag('§l§d[§e' . self::TYPE . '§d]');
        $this->setNameTagAlwaysVisible(true);
    }

    public function canBeMovedByCurrents(): bool
    {
        return false;
    }

    public function hasMovementUpdate(): bool
    {
        return false;
    }

    public function attack(EntityDamageEvent $source): void
    {
        if ($source instanceof EntityDamageByEntityEvent) {
            if (($damager = $source->getDamager()) instanceof Player) {
                // Open manage UI/GUI for damager
            }
        }

        $source->cancel();
    }
}