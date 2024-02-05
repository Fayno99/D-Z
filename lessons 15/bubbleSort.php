<?php
$unsorting =[3,28,2,54,4,6,8,9,12,1];
function  showArray(array $array)
{
    $arrayInString = '[' . implode(', ', $array). '}';
    echo $arrayInString . PHP_EOL;
}

function sortUsingBubble(array $array ):array
{
    for ($i = count($array) - 1; $i > 0; $i--) {
        $isSwapped = false;
        for ($j = 0; $j < $i; $j++) {
            $currentElement = $array[$j];
            $nextElement = $array[$j + 1];

            if ($currentElement > $nextElement) {
                $temp = $currentElement;

                $array[$j] = $nextElement;
                $array[$j + 1] = $temp;

                $isSwapped = true;
            }

            showArray($array);
        }
        if(!$isSwapped){
            break;
        }
    }

        return $array;
}

showArray($unsorting);
$sorted = sortUsingBubble($unsorting);
showArray($sorted);
echo "The smallest number in the array is: " .($sorted[0]). PHP_EOL;
echo "inverse sorting ". PHP_EOL;

function inverseSortUsingBubble(array $array ):array
{
    for ($i = count($array) - 1; $i > 0; $i--) {
        $isSwapped = false;
        for ($j = 0; $j < $i; $j++) {
            $currentElement = $array[$j];
            $nextElement = $array[$j + 1];

            if ($currentElement < $nextElement) {
                $temp = $currentElement;

                $array[$j] = $nextElement;
                $array[$j + 1] = $temp;

                $isSwapped = true;
            }

            showArray($array);
        }
        if(!$isSwapped){
            break;
        }
    }

    return $array;
}

showArray($unsorting);
$sorted = inverseSortUsingBubble($unsorting);

showArray($sorted);
echo "The biggest number in the array is: " .$sorted[0]. PHP_EOL;


