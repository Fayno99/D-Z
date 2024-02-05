<?php
session_start();
require_once('db.php');
require_once('lessons 13.php');
$pdo = getPDO();

    $deleteSesion = deleteSesion ($pdo, $_SESSION['Admin']);
    session_unset();
    session_destroy();
    header("Location: ./Login.php");
    exit( );

$pdo= null;