<?php

declare(strict_types=1);

namespace RemBog\FloatingTextAPI;

use pocketmine\world\Position;
use RemBog\FloatingTextAPI\exception\InvalidIdException;

class FloatingText
{
    protected int $id;
    
    protected string $text;
    
    protected Position $position;
    
    public function __construct(int $id, string $text, Position $position)
    {
        if(array_key_exists($id, FloatingTextMain::$list))
        {
            throw new InvalidIdException("Invalid floating text id, $id is already used");
        }
        
        $this->id = $id;
        $this->text = $text;
        $this->position = $position;
        
        FloatingTextMain::$list[$id] = $this;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getText(): string
    {
        return $this->text;
    }
    
    public function getPosition(): Position
    {
        return $this->position;
    }
    
    public function setId(int $newId): void
    {
        $this->id = $newId;
    }
    
    public function setText(string $newText): void
    {
        $this->text = $newText;
    }
    
    public function setPosition(Position $newPosition): void
    {
        $this->position = $newPosition;
    }
}
