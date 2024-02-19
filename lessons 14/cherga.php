<?php
class QueueDataStorage            //черга
{
    public $sherga = [];

    public function add(int $value)
    {
        array_push($this->sherga, $value);
    }

    public function get()
    {
        return array_shift($this->sherga);
    }

    public function count()
    {
        return count($this->sherga);
    }

    public function isEmpty()
    {
       if ( $this->count() === 0){
        echo " В масиві немає жодного значення".PHP_EOL;
    }

    }

    public function clear()
    {
        $this->sherga = [];
    }
}

$shergaNew = new QueueDataStorage;
$shergaNew->add(1);
$shergaNew->add(2);
$shergaNew->add(3);
$shergaNew->add(4);
$shergaNew->add(5);

echo "кількість значень в масиві черги ", count($shergaNew->sherga) . PHP_EOL;
//var_dump($shergaNew).PHP_EOL;
echo print_r($shergaNew) . PHP_EOL;

$shergaNew->get() . PHP_EOL;
echo print_r($shergaNew). PHP_EOL;

$shergaNew->clear(); //знищуємо масив
echo "Масив очищено " . PHP_EOL;
echo print_r($shergaNew);
$shergaNew->isEmpty() . PHP_EOL;
