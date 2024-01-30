<?php
session_start();
require_once ('db.php');
$pdo = getPDO();
if (!empty($_SESSION['Admin']) && !empty($_POST['mes'])){
    addNewMessage($pdo, $_POST['mes'],$_SESSION['Admin']);
}
$pdo = null;