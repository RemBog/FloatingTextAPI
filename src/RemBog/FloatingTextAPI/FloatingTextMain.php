<?php

namespace RemBog\FloatingTextAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;

class FloatingTextMain extends PluginBase
{
    public static array $list = [];
    
    protected function onEnable(): void
    {
        EntityFactory::getInstance()->register(FloatingTextEntity::class, function(World $world, CompoundTag $nbt): Entity
        {
            return new FloatingTextEntity(EntityDataHelper::parseLocation($nbt, $world));
        }, ['FloatingText']);
    }
}