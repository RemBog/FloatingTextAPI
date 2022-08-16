<?php

namespace RemBog\FloatingTextAPI;

use pocketmine\entity\Skin;
use pocketmine\entity\Location;
use pocketmine\nbt\tag\CompoundTag;

class FloatingTextAPI
{
    public static function spawnFloatingText(int $id): void
    {
        $ft = FloatingTextMain::$list[$id];
        
        $pos = $ft->getPosition();
        $loc = new Location($pos->x, $pos->y, $pos->z, $pos->getWorld(), 0, 0);
        
	    $entity = new FloatingTextEntity($loc, $id);
	    
        $entity->spawnToAll();
    }
}