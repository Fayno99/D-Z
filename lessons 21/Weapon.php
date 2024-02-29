<?php
class Weapon
{
    protected const damage = 0;

    public function getDamage(): int
    {
        return static::damage;
    }
}

class Bow extends Weapon         { protected const damage = 16; }   // Клас Лук

class Crossbow extends Weapon    { protected const damage = 12;}   // Клас Арбалет

class MagicStaff extends Weapon  { protected const damage = 18; }  // Клас Магічний посох

class Sword extends Weapon       { protected const damage = 15; }  // Клас Меч

class Pistol extends Weapon      { protected const damage = 20; }  // Клас Пістолет

