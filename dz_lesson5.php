<?php

function fibanachi ($limit)
{
    $a=1;                        //початковві значення змінної а
    $b=$c=$f=$sum=0;             //початковві значення інших змінних
    for ($i = 1; $i <= $limit; $i++)
    {
        echo 'iteration ' . $i . ' result ' . $c . ' sum is ' . $sum . PHP_EOL;  //якщо не вивести початкові зміні в початок коду в послідовності не буде числа 0
        $c = $a + $b;            //формула для обчислення послідовності Фібаначі
        $sum = $c + $f;          //формула для обчислення суми послідовних чисел
        $a = $b;                 //число a приймає значення b це потрібно для вичеслення наступної ітерації
        $b = $c;                 //число б приймає значення c це потрібно для вичеслення наступної ітерації
        $f = $sum;               //ця зміна чисел потрібна для вичеслення суми всіх чисел
    }
}
   fibanachi(10);
