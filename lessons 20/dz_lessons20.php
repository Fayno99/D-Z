<?php

class Hero {
    public $name;
    protected $health;
    protected $stamina;
    protected Weapon $weapon;

    public function __construct (
        string $name,
        float|int  $health,
        float|int  $stamina,
        Weapon $weapon
    ) {
        $this->name = $name;
        $this->health = $health;
        $this->stamina = $stamina;
        $this->weapon = $weapon;
    }

        public function getHealth(): float|int
        {
        return $this->health;
    }
    public function getStamina(): float|int
    {
        return $this->stamina;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function attack(Hero $opponent) {

        $attackPower = $this->weapon->getDamage(); // Визначаємо силу атаки на основі зброї героя


        $this->stamina -= 10;                       // Зменшуємо стаміну героя


        if ($this->stamina < 20) {                 // Якщо стаміна героя низька, зменшуємо силу атаки
            $attackPower /= 2;
        }


        $opponent->health -= $attackPower;          // Віднімаємо силу атаки від здоров'я опонента


        if ($opponent->health <= 0) {               // Перевіряємо, чи опонент ще живий
            echo "Герой {$this->name} переміг!";
        }
    }
}

class Warrior extends Hero                          // Клас воїн
{
    public function __construct(string $name ,int $health, int $stamina, Weapon $weapon)
    {
        parent::__construct($name, $health +23, $stamina-10, $weapon);
    }
}

class Mage extends Hero                           // Клас Маг
{
   public function __construct(string $name, float|int $health, float|int $stamina, Weapon $weapon)
   {
       parent::__construct($name, $health+15, $stamina+30, $weapon);
   }
}

class Archer extends Hero                        // Клас Лучник
{
    public function __construct(string $name, float|int $health, float|int $stamina, Weapon $weapon)
    {
        parent::__construct($name, $health+50, $stamina+100, $weapon);
    }
}

class Weapon
{
    protected const damage = 0;

    public function getDamage(): int
    {
        return static::damage;
    }
}

class Bow extends Weapon          // Клас Лук
{
    public const damage = 16;
}

class Crossbow extends Weapon    // Клас Арбалет
{
    protected const damage = 12;
}

class MagicStaff extends Weapon  // Клас Магічний посох
{
    protected const damage = 18;
}

class Sword extends Weapon      // Клас Меч
{
    protected const damage = 15;
}

class Pistol extends Weapon    // Клас Пістолет
{
    protected const damage = 20;
}


class Battle
{
    private $hero1;
    private $hero2;

    public function __construct(Hero $hero1, Hero $hero2)
    {
        $this->hero1 = $hero1;
        $this->hero2 = $hero2;
    }


    public function fight() {
        $round = 1;

        while ($this->hero1->getHealth() > 0 && $this->hero2->getHealth() > 0) {
            echo "Раунд: " . $round . PHP_EOL;
            echo "Здоров'я". $this->hero1->getName()  ."перед атакою: " . $this->hero1->getHealth(). " витривалість ". $this->hero1->getStamina() . PHP_EOL;
            $this->hero1->attack($this->hero2);
            echo "Здоров'я ". $this->hero2->getName()  ." після атаки ". $this->hero1->getName()  .": " . $this->hero2->getHealth() . " витривалість ". $this->hero2->getStamina(). PHP_EOL;

            if ($this->hero2->getHealth() <= 0) {
                break;
            }

            echo "Здоров'я ". $this->hero2->getName()  ." перед атакою: " . $this->hero2->getHealth() . " витривалість ". $this->hero2->getStamina(). PHP_EOL;
            $this->hero2->attack($this->hero1);
            echo "Здоров'я ". $this->hero1->getName()  ." після атаки" . $this->hero2->getName() . $this->hero1->getHealth() . " витривалість ". $this->hero1->getStamina(). PHP_EOL;

            $round++;
        }

        // Визначаємо переможця
        if ($this->hero1->getHealth() <= 0) {
                return $this->hero2;
        } else {
                return $this->hero1;
        }
    }

}

$Weapon = new Weapon;
$Bow = new Bow;
$Crossbow= new Crossbow;
$MagicStaff = new MagicStaff;
$Sword = new Sword;
$Pistol = new Pistol;
$hero1 = new Warrior('Batman', 100, 100,  $Sword );         // Створення нового героя
$hero2 = new Mage('Dumbledore',100,100, $MagicStaff);       // Створення нового героя
$hero3 = new Archer('Robin good', 100,100,$Crossbow);       // Створення нового героя
$hero4 = new Warrior('Spartan', 100,100,$Crossbow);         // Створення нового героя

echo $hero1 ->getHealth().PHP_EOL;
echo $hero2->getHealth() .PHP_EOL;
echo $hero3->getHealth() .PHP_EOL;
echo $hero4->getHealth() .PHP_EOL;

$battle = new Battle($hero1, $hero2);
$winner = $battle->fight();
echo "Переможець бою: " . $winner->name . PHP_EOL;

$battle1 = new Battle($hero4, $hero3);
$winner1 = $battle1->fight();
echo "Переможець бою: " . $winner1->name . PHP_EOL;
