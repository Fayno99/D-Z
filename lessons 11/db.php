<?php
function  getConnection() {
    $host = 'localhost';
    $username = 'root';
    $password = 'vf270691VF';
    $dbName = 'dz_11';

    $con = mysqli_connect($host, $username, $password, $dbName);

    if ($con->connect_error) {
        die("Connection failed" . $con->connect_error);
    }
   // echo "hoorey";
 return $con;
}


function showAndDie($somethin)
{
 echo '<pre>';
 var_dump($somethin);
 echo '<pre>';
 die();
}

//SELECT
function getAllMessages($con):array
{
    $data = [];
    $sql = 'SELECT * FROM Chat';
    $ressult =$con->query($sql);

    while ($row = mysqli_fetch_array($ressult, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}
//insert
function addNewMessage($con,$mes, $Admin)
{
$sql = "INSERT INTO Chat (chat, login) VALUES (\"$mes\",\"$Admin\")";
if (mysqli_query($con,$sql)){
  //  echo 'New record ok';
    } else 'mesagges not send';
}
//delete
function deleteMessages($con, $ID){
    $sql ="DELETE FROM Chat WHERE ID=".$ID;
if (mysqli_query($con,$sql)){
  //  echo 'Delete ok';
} else 'mesagges not send';

}
//for login
function addNewUser($con, $user, $password)
{
    $sql = "INSERT INTO autorization (userName, password) VALUES (\"$user\",\"$password\")";
    if (mysqli_query($con,$sql)){
        //  echo 'New record ok';
    } else 'mesagges not send';
}

function getAllUser($con):array
{
    $data = [];
    $sql = 'SELECT * FROM autorization';
    $ressult =$con->query($sql);
    while ($row = mysqli_fetch_array($ressult, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}

function getIsSet($con,$user){
    $sql = "SELECT * FROM autorization WHERE userName=(\"$user\")";
    $result = $con->query($sql);
    return  $result->num_rows > 0;
}

function getIsSetPass($con,$user,$pass){
    $sql = "SELECT * FROM autorization WHERE userName=(\"$user\") AND password=(\"$pass\")";
    $result = $con->query($sql);
    return  $result->num_rows > 0;
}


/// for online user

function addOnlineUser($con, $Admin)
{
    $sql = "INSERT INTO Online (userOn) VALUES (\"$Admin\")";
    if (mysqli_query($con,$sql)){
         echo 'New record ok';
    } else 'mesagges not send';
}

function getIsSetLognOnline($con,$user){
    $sql = "SELECT * FROM Online WHERE userOn=(\"$user\")";
    $result = $con->query($sql);
    return  $result->num_rows>0;
}

function deleteSesion($con, $online)
{
    $sql = "DELETE FROM Online WHERE userOn=(\"$online\")";
    if (mysqli_query($con, $sql)) {
        //  echo 'Delete ok';
    } else 'mesagges not send';
}

function getOnlineUsers($con):array
{
    $data = [];
    $sql = 'SELECT * FROM Online';
    $ressult =$con->query($sql);
    while ($row = mysqli_fetch_array($ressult, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}