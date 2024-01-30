<?php
function  getPDO(): PDO
{
    $host = 'localhost';
    $username = 'root';
    $password = 'vf270691VF';
    $dbName = 'dz_13';
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    return $pdo;

}

function showAndDie($somethin)
{
    echo '<pre>';
    var_dump($somethin);
    echo '<pre>';
    die();
}

//SELECT
function getAllMessages(PDO $pdo): array
{
    $data = [];
    $sql = 'SELECT * FROM Chat';
    $queryRunner = $pdo->query($sql);
    $queryRunner ->setFetchMode(PDO::FETCH_ASSOC);
    while ($row =$queryRunner-> fetch()) {
        $data[] = $row;
    }
    return $data;
}

//insert
function addNewMessage(PDO $pdo,string $mes,string  $Admin)
{
$sql = "INSERT INTO Chat (chat, login) VALUES (:mes,:Admin)";
$queryRunner = $pdo->prepare($sql);

if (!$queryRunner->execute (['mes'=> $mes, 'Admin'=> $Admin])){
   echo 'New record ok';
    } else echo 'mesagges not send';
}
//delete
function deleteMessages($pdo, $ID){
    $sql ="DELETE FROM Chat WHERE ID=:ID";
    $queryRunner = $pdo->prepare($sql);

if (!$queryRunner->execute(['ID'=> $ID])) {
  echo 'Something went wrong';
} else echo 'mesagges send';

}
//for login
function addNewUser(PDO $pdo, string $user, string $password)
{
    $sql = "INSERT INTO autorization (userName, password) VALUES (:user, :password)";
    $queryRunner = $pdo->prepare($sql);

    if (!$queryRunner->execute (['user'=> $user, 'password'=> $password])){
        //  echo 'New record ok';
    } else  echo 'mesagges not send';
}

function getAllUser(PDO $pdo):array
{
    $data = [];
    $sql = 'SELECT * FROM autorization';
    $queryRunner = $pdo->query($sql);
    $queryRunner ->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $queryRunner-> fetch()) {
        $data[] = $row;
    }

    return $data;
}

function getIsSet(PDO $pdo, $user){
    $sql = "SELECT * FROM autorization WHERE userName=:user";
    $queryRunner = $pdo->prepare($sql);
    $queryRunner->bindValue(':user', $user);
    $queryRunner->execute();
    return $queryRunner->rowCount() > 0;
}

function getIsSetPass(PDO $pdo,$user,$pass){
    $sql = "SELECT * FROM autorization WHERE userName=(:user) AND password=(:pass)";
    $queryRunner = $pdo->prepare($sql);
    $queryRunner->bindValue(':user', $user);
    $queryRunner->bindValue(':pass', $pass);
    $queryRunner->execute();
    return  $queryRunner->rowCount() > 0;
}

///// for online user

function addOnlineUser(PDO $pdo, string $Admin)
{
    $sql = "INSERT INTO Online (userOn) VALUES (:Admin)";
    $queryRunner = $pdo->prepare($sql);
    if (!$queryRunner->execute (['Admin'=> $Admin])){
         echo 'New record ok';
    } //else  echo 'mesagges not send';
}

function getIsSetLognOnline(PDO $pdo,string $user){
    $sql = "SELECT * FROM Online WHERE userOn=(:user)";
    $queryRunner = $pdo->prepare($sql);
    $queryRunner->bindValue('user', $user);
    $queryRunner->execute();
    return  $queryRunner->rowCount() > 0;
}

function deleteSesion(PDO $pdo, $online)
{
    $sql = "DELETE FROM Online WHERE userOn=:online";
    $queryRunner = $pdo->prepare($sql);

    if (!$queryRunner->execute(['online'=> $online])) {
        echo 'Something went wrong';
    } //else echo 'mesagges not send';
}

function getOnlineUsers(PDO $pdo):array
{
    $data = [];
    $sql = 'SELECT * FROM Online';
    $queryRunner = $pdo->query($sql);
    $queryRunner ->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $queryRunner -> fetch()) {
        $data[] = $row;
    }
    return $data;
}


