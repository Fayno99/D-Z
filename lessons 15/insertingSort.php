<?php
$unsorting =[3,28,2,54,4,6,8,9,12,1];

function  showArray(array $array)
{
    $arrayInString = '[' . implode(', ', $array). '}';
    echo $arrayInString . PHP_EOL;
}

function insertingSort(array $array ):array
{
    for ($i = 0; $i < count($array); $i++) {
        $currentElement = $array[$i];
        $j = $i-1;
        while($j>=0 && $array[$j] > $currentElement){
           $array[$j + 1] = $array[$j];
            $j--;
        }
        $array[$j+1] = $currentElement;
        showArray($array);
    }
    return $array;
}

$sorted = insertingSort($unsorting);
showArray($sorted);

echo "The smallest number in the array is: " .$sorted[0]. PHP_EOL;

echo "inverse sorting ". PHP_EOL;


function inverseInsertingSort(array $array ):array
{
    for ($i = 0; $i < count($array); $i++) {
        $currentElement = $array[$i];
        $j = $i-1;
        while($j>=0 && $array[$j] < $currentElement){
            $array[$j + 1] = $array[$j];
            $j--;
        }
        $array[$j+1] = $currentElement;
        showArray($array);
    }
    return $array;
}

$sorted = inverseInsertingSort($unsorting);

showArray($sorted);

echo "The biggest number in the array is: " .$sorted[0]. PHP_EOL;
