<?php

class FocalFossa {
    function OperatingSystem ()
    {
        echo 'Це кодова назва LTS версії операційної системи UBUNTU' .PHP_EOL ;
    }
    function Animal ()
    {
        echo 'Справжня агресивна дика кішка '.PHP_EOL;
    }
}

class JammyJellyfish  extends FocalFossa {
     function Pelagian ()
     {
         echo 'Ці захоплюючі тварини не мають мозку, крові або серця, що робить їх красивими, але простими істотами'.PHP_EOL;
     }
}

class NobleNumbat extends JammyJellyfish {
    function Animal ()
    {
        echo 'Вид ряду хижі сумчасті, єдиний вид родини Myrmecobiidae'.PHP_EOL;
    }
}

$FocalFossa = new FocalFossa;
$JammyJellyfish = new JammyJellyfish;
$NobleNumbat = new NobleNumbat;

$NobleNumbat->OperatingSystem ();
$JammyJellyfish->OperatingSystem();
$FocalFossa ->OperatingSystem();
$FocalFossa->Animal();
$NobleNumbat->Animal();
$JammyJellyfish->Pelagian();



