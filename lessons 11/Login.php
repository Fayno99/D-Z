<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['Admin'])) {
   header("location: lessons 11.php");
}
?>
<?php
require_once ('db.php');
$con = getConnection();
//showAndDie($messages);
//showAndDie(getAllMesages($con));
$getSetLogin = getIsSet($con, $_POST['user']);

if (!empty($_POST['user']) && !empty($_POST['password']) && !$getSetLogin ){
    addNewUser($con, $_POST['user'],$_POST['password']);
}
//var_dump($_SESSION['Admin']);
//if (!empty($_GET['delete_message'])){
//    showAndDie($_GET);
//    deleteMessages($con, $_GET['delete_message']);
//}
$messages = getAllMessages($con);
$users = getAllUser($con);
$getSetPassword = getIsSetPass($con, $_POST['user'],$_POST['password']);
mysqli_close($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DZ_11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body class="p-3 mb-2  bg-dark">
<div class="container " style="width: 40rem; margin: auto; ">
    <br><br>
    <div class="p-3 mb-2 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ім'я</label>
                <input type="text" class="form-control" name="user" id="exampleInputEmail1"
                       aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Сьогодні ми покажемо ваші данні іншим користувачам (і це вже точно)</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Увійти в чат</button>

            <?php
           if  ( (isset($_POST['btn'])) && (!empty($_POST['user'])) && (!empty($_POST['password'])) && $getSetPassword ){
                $_SESSION['Admin']=$_POST['user'];
                $_SESSION['is_registered'] = true;
                  header("Location: ./lessons 11.php");
                exit( );
            }
            ?>
        </form>
        <br>
    </div>
    <br><br>
    <div class="p-4 mb-3 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <h2>Користувачі які вже існіють
            <span class="badge bg-secondary">
 <div  class="p-4 mb-3 position-center">
                <ul class="list-group list-group-flush">
                <?php foreach ($users as $user):?>
                    <li class="list-group-item"> <?=$user['userName'] ?>
                                <?php endforeach;?>
            </ul>
        </div>
     </span></h2>
    </div>
</body>
</html>