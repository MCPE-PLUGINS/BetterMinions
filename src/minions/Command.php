<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\minions;

use MCPE_PLUGINS\BetterMinions\form\MinionsShop;
use pocketmine\command\Command as CommandParent;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

final class Command extends CommandParent
{
    const NAME = 'minions';

    public function __construct()
    {
        parent::__construct(self::NAME, 'BetterMinions Shop', null, array());
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) return;

        $sender->sendForm(new MinionsShop());
    }
}