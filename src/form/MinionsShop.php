<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterMinions\form;

use MCPE_PLUGINS\BetterMinions\form\api\SimpleForm;
use MCPE_PLUGINS\BetterMinions\minions\SpawnEgg;
use MCPE_PLUGINS\BetterMinions\minions\type\Miner;
use pocketmine\player\Player;

final class MinionsShop extends SimpleForm
{
    protected function title(): string
    {
        return '§l§5[§8Minions Shop§5]';
    }

    protected function content(): string
    {
        return '§3+ §7Choose your minion.';
    }

    protected function buttons(): array
    {
        return array( # TODO: Farmer, Trader, Picker, Dropper
            '§l§8Miner'
        );
    }

    protected function onClickButton(Player $player, int $button): void
    {
        $inventory = $player->getInventory();

        if ($inventory->firstEmpty() >= 0) { # TODO: Money api work
            $type = match ($button) {
                0 => Miner::TYPE,
            };
            $spawn_egg = new SpawnEgg($type);
            $inventory->addItem($spawn_egg->getItem());
            $player->sendMessage("You bought ×1 Minion $type.");

            return;
        }

        $player->sendMessage('You don\'t have free slot in your inventory!');
    }
}