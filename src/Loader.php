<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions;

use JetBrains\PhpStorm\Pure;
use MCPE_PLUGINS\BetterMinions\minions\Command;
use MCPE_PLUGINS\BetterMinions\minions\MinionHandler;
use pocketmine\plugin\PluginBase;

final class Loader extends PluginBase
{
    private static self $Instance;

    protected function onEnable(): void
    {
        self::$Instance = $this;

        Factory::registerMinions();

        $this->getServer()->getCommandMap()->register(Command::NAME, new Command());
        $this->getServer()->getPluginManager()->registerEvents(new EventsHandler(), $this);
    }

    #[Pure] public function minion(): MinionHandler
    {
        return new MinionHandler();
    }

    public static function getInstance(): self
    {
        return self::$Instance;
    }
}
