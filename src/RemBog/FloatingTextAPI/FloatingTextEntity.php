<?php

namespace RemBog\FloatingTextAPI;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\Entity;
use pocketmine\entity\Location;
use pocketmine\entity\Skin;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\event\entity\EntityDamageEvent;

class FloatingTextEntity extends Entity
{
    protected $idFt;
    
    public function __construct(Location $location, ?int $id = null)
    {
        parent::__construct($location);
        
        if(!is_null($id))
        {
            $this->setNameTag(FloatingTextMain::$list[$id]->getText());
        }
        
        $this->idFt = $id;
        
        $this->setNameTagAlwaysVisible();
        $this->setInvisible();
        $this->setImmobile();
    }
    
    public static function getNetworkTypeId(): string
    {
        return "minecraft:falling_block";
    }
    
    protected function getInitialSizeInfo(): EntitySizeInfo
    {
        return new EntitySizeInfo(1.8, 0.6, 1.62); 
    }
    
    public function getName(): string
    {
        return "FloatingText";
    }

    public function getMaxHealth(): int
    {
        return 1000;
    }
    
    public function getDrops(): array
    {
        return [];
    }
    
    public function getXpDropAmount(): int
    {
        return 0;
    }
    
    public function onUpdate(int $currentTick): bool 
    {
        if($this->isClosed())
        {
            return false;
        }
        
        if(!is_null($this->idFt))
        {
            $this->idFt = FloatingTextMain::$list[$this->idFt]->getId();
            $this->setNameTag(FloatingTextMain::$list[$this->idFt]->getText());
        }
        
        return parent::onUpdate($currentTick);

    }
}
