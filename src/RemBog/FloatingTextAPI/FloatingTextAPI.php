<?php

namespace RemBog\FloatingTextAPI;

use pocketmine\entity\Location;

class FloatingTextAPI
{
    public static function appearFloatingText(int $id): void
    {
        $ft = FloatingTextMain::$list[$id];
        
        $pos = $ft->getPosition();
        $loc = new Location($pos->x, $pos->y, $pos->z, $pos->getWorld(), 0, 0);
        
	    $entity = new FloatingTextEntity($loc, $id);
        $entity->spawnToAll();
    }
    
    public static function disappearFloatingText(int $id): void
    {
        $ft = FloatingTextMain::$list[$id];
        unset(FloatingTextMain::$list[$id]);
        $ft->kill();
    }
}
