<?php
include 'Weapon.php';
include 'Hero.php';
include 'Battle.php';


$Bow = new Bow;
$Crossbow= new Crossbow;
$MagicStaff = new MagicStaff;
$Sword = new Sword;
$Pistol = new Pistol;
$hero1 = new Warrior(' Batman ', 100, 100,  $Sword );         // Створення нового героя
$hero2 = new Mage(' Dumbledore ',100,100, $MagicStaff);       // Створення нового героя
$hero3 = new Archer(' Robin good ', 100,100,$Crossbow);       // Створення нового героя
$hero4 = new Warrior(' Spartan ', 100,100,$Crossbow);         // Створення нового героя

$hero5 = new Hero(' Groot ', 180,200,$Pistol);                  //Створити любого героя без урахування класів маг, воїн...

echo $hero1 ->getHealth().PHP_EOL;
echo $hero2->getHealth() .PHP_EOL;
echo $hero3->getHealth() .PHP_EOL;
echo $hero4->getHealth() .PHP_EOL;

$battle = new Battle($hero1, $hero2);                          // Бій між  1 та 2 геройом
$winner = $battle->fight();
echo "Переможець бою: " . $winner->name . PHP_EOL;

$battle1 = new Battle($hero5, $hero3);                         // Бій між  5 та 3 геройом
$winner1 = $battle1->fight();
echo "Переможець бою: " . $winner1->name . PHP_EOL;
