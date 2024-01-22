<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['Admin'])) {
    header("location: Login.php");
}
require_once ('db.php');
//require_once ('Login.php');
$con = getConnection();
//showAndDie($messages);
//showAndDie(getAllMesages($con));
if (!empty($_SESSION['Admin']) && !empty($_POST['mes'])){
    addNewMessage($con, $_POST['mes'],$_SESSION['Admin']);
}
if (!empty($_GET['delete_message'])){
    //showAndDie($_GET);
    deleteMessages($con, $_GET['delete_message']);
}
$getSetLoginOnline = getIsSetLognOnline($con, $_SESSION['Admin'] );
if (!empty($_SESSION['Admin'])&& !$getSetLoginOnline ){
    addOnlineUser($con, $_SESSION['Admin']);
}
$getOnlineUsers= getOnlineUsers($con);
$messages = getAllMessages($con);
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
        <div class="card" style="...">
            <div class="card-header" > Chat</div>
            <ul class="list-group list-group-flush">
                <?php foreach ($messages as $message):?>
                <li class="list-group-item">
                    <strong><?=$message['chat'] ?> </strong>
                    at <?=$message['timestamp'] ?>
                    by <?= $message['login'] ?>
                    <?php  if ($_SESSION['Admin']=="Admin"): ?>
                <a href="?delete_message=<?=$message['ID']?>">X</a></li>
                    <?php endif; ?>
                <?php endforeach;?>
            </ul>
        </div>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Текст повідомлення</label>
            <input type="text" class="form-control" name="mes" id="exampleInputPassword1">
        </div>
        <button type="submit" name="btn" class="btn btn-primary">Відправити</button>
        <button type="submit" name="btnOut" class="btn btn-primary">Вийти</button>
        <?php
        if ((isset($_POST['btnOut'])) ) {
            $deleteSesion = deleteSesion ($con, $_SESSION['Admin']);
            session_unset();
            session_destroy();
            header("Location: ./Login.php");
            exit( );
        }
        mysqli_close($con);
        ?>
    </form>
 <br>
    </div>
        <br><br>
    <div class="p-4 mb-3 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <h2>Користувачі Online
            <span class="badge bg-secondary">
   <?php
        foreach ($getOnlineUsers as $getOnlineUser):?>
                <li class="list-group-item"> <?=$getOnlineUser['userOn'] ?>
                        <?php endforeach;?>
               </span></h2>
    </div>
</body>
</html>