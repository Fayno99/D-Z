<?php
require_once ('db.php');
$pdo = getPDO();

if (!empty($_GET['delete_message'])){
    //showAndDie($_GET);
    deleteMessages($pdo, $_GET['delete_message']);
}