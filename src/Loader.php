<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions;

use pocketmine\plugin\PluginBase;

final class Loader extends PluginBase
{
    private static self $Instance;

    protected function onEnable(): void
    {
        self::$Instance = $this;

        Factory::registerMinions();

        $this->getServer()->getPluginManager()->registerEvents(new EventsHandler(), $this);
    }

    public static function getInstance(): self
    {
        return self::$Instance;
    }
}
