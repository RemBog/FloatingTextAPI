<?php

declare(strict_types=1);

namespace RemBog\FloatingTextAPI;

use pocketmine\world\Position;
use RemBog\FloatingTextAPI\exception\InvalidIdException;

class FloatingText
{
    /** @var int */
    protected $id;
    
    /** @var string */
    protected $text;
    
    /** @var Vector3 */
    protected $position;
    
    public function __construct(int $id, string $text, Position $position)
    {
        if(in_array($id, FloatingTextMain::$list))
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
    
    public function setText(string $newText): void
    {
        $this->text = $newText;
    }
}