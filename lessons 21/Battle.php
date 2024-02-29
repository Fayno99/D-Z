<?php

class Battle implements HeroSay
{
    private $hero1;
    private $hero2;

    public function __construct(Hero $hero1, Hero $hero2 )
    {
        $this->hero1 = $hero1;
        $this->hero2 = $hero2;

    }
    public  function say(): void
    {
        $phrases = [" Я готовий до битви! ", " Отримуй в мене для тебе ще є багато! ", " За перемогу! ", " Не можна втратити! ", " Може пішли на кофе? "];
        echo $phrases[array_rand($phrases)];
    }
    public function sayOnWin()
    {
        // TODO: Implement sayOnWin() method.
    }

    public function sayOnLose()
    {
        // TODO: Implement sayOnLose() method.
    }

    public function fight() {
        $round = 1;

        while ($this->hero1->getHealth() > 0 && $this->hero2->getHealth() > 0) {
            echo "Раунд: " . $round . PHP_EOL;
            echo $this->hero1->getName(), $this->say(). PHP_EOL;
            echo $this->hero2->getName(), $this->say(). PHP_EOL;
            echo "Здоров'я". $this->hero1->getName()  ." перед атакою: " . $this->hero1->getHealth(). " витривалість ". $this->hero1->getStamina() . PHP_EOL;
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