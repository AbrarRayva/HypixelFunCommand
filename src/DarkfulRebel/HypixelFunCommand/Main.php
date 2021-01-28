<?php

namespace DarkfulRebel\HypixelFunCommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if(strtolower($command->getName()) === "opme"){
            $sender->sendMessage("§cYou are no longer OP.");
        } elseif(strtolower($command->getName()) === "hi"){
            $sender->sendMessage("Why hello there.");
        } elseif(strtolower($command->getName()) === "hello"){
            $sender->sendMessage("Why hello there.");
        } elseif(strtolower($command->getName()) === "boop"){
            if(count($args) === 1) {
                $playername = $args[0];
                $target = $this->getServer()->getPlayer($playername);
                $senderName = $sender->getName();

                if (strtolower($playername) === strtolower($senderName)){
                    $sender->sendMessage("You can't use /boop on yourself!");
                } elseif ($target instanceof Player) {
                    $target->sendMessage("§dFrom §r" . $senderName . ": §d§lBoop!");
                    $sender->sendMessage("§dTo §r" . $target->getName() . ": §d§lBoop!");
                } else {
                    $sender->sendMessage("§cPlayer not found!");
                }
            } else {
                $sender->sendMessage("Usage: /boop <playername>");
            }
        }
        return true;
    }
}