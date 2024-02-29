<?php
include 'HeroSay.php';

class Hero implements HeroSay
{
    public $name;
    protected $health;
    protected $stamina;
    protected Weapon $weapon;

    public function __construct (
        string $name,
        float|int  $health,
        float|int  $stamina,
        Weapon $weapon,

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
            echo "Я" . $this->name;
            $this->sayOnWin();
            echo $opponent->name;
            $this->sayOnLose();
        }
    }
    public  function say(): void
    {
        $phrases = [" Я готовий до битви! ", " Отримуй в мене для тебе ще є багато! ", " За перемогу! ", " Не можна втратити! ", " Може пішли на кофе? "];
        echo $phrases[array_rand($phrases)];
    }

    public function sayOnLose(): void
    {
            $lose_phrases = [" Я програв...",  " Я хочу певаншу... ", " Мені потрібно стати сильнішим... ", " Я повернусь... ", " Ходжу с прот зал а все без толку... "];
            echo $lose_phrases[array_rand($lose_phrases)];
    }

    public  function sayOnWin(): void
    {
        $win_phrases = [" Я переміг! ", " Це було легко! ", " Хто наступний? ", " Переможений миє посуд "];
        echo $win_phrases[array_rand($win_phrases)];
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
