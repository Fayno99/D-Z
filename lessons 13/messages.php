<?php
require_once ('db.php');
$pdo = getPDO();
$messages=getAllMessages($pdo);
//showAndDie($messages);

 $pdo = null;

header('Content-Type: application/json; charset=UTF-8');
echo json_encode(['data'=>$messages]);
