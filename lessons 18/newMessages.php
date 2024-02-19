<?php
session_start();
require_once ('db.php');
$pdo = getPDO();
class newMessages {
    public $user;
    public $mesage;

    function __construct ($m, $u) {
        $this->user= $u;
        $this->mesage = $m;
    }
}
$messageIn= new newMessages($_POST['mes'],$_SESSION['Admin']);

if (!empty($_SESSION['Admin']) && !empty($_POST['mes'])){
    addNewMessage($pdo, $messageIn);
}
$pdo = null;