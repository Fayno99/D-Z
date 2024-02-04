<?php
class StackDataStorage            //стек
{
    public $stek = [];

    public function add(int $value)
    {

//    array_push($this->storage, $value);   //  те ж саме
        $this->stek[] = $value;
    }

    public function get()
    {
        return array_pop($this->stek);
    }

    public function count()
    {
        return count($this->stek);
    }

    public function isEmpty()
    {
        if ( $this->count() === 0){
            echo " В масиві немає жодного значення".PHP_EOL;
        }
    }

    public function clear()
    {
        $this->stek = [];
    }
}

$stekNew = new StackDataStorage;
$stekNew->add(1);
$stekNew->add(2);
$stekNew->add(3);
$stekNew->add(4);

echo "кількість значень в масиві стеку ", count($stekNew->stek) . PHP_EOL;
echo print_r($stekNew) . PHP_EOL;

$stekNew->get(); //витягуємо з стеку значення
echo print_r($stekNew) . PHP_EOL;
$stekNew->clear(); //знищуємо масив
echo "Масив очищено " . PHP_EOL;
echo print_r($stekNew) . PHP_EOL;
$stekNew->isEmpty() . PHP_EOL;
