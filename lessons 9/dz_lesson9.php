<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bootstrap test</title>
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
        <?php
        if (!empty($_POST['email'])): ?>
            <div class="alert alert-success" role="alert">
                Ви вказали @mail
                <?=
                $_POST['email'];
                ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Емейл адреса</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                       aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Ми ніколи не покажемо ваші данні іншим користувачам (але не точно)</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Підтвердити</button>
        </form>
        <br>
    </div>
    <br><br>
    <?php

    if (!empty($_POST['email']))
    {
        $email = $_POST['email'];
        $password =$_POST['pass'];
        $delimeter = '|-|';
        $stringWithData = $email . $delimeter . $password;
        $dataFromString = explode($delimeter, $stringWithData);
        $fileToFill =fopen("dz_data.txt", "a+") or die ("couldn't read the file");
        fwrite($fileToFill, $stringWithData .PHP_EOL);
        fclose($fileToFill);
    };
    if (empty($fileToRead))  : ?>
    <div class="p-4 mb-3 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <h2>Користувачі які вже зареєструвались
            <form method="post">
                <button type="submit"  class="btn btn-primary" name="delBtn">Видалити </button>
                <input class="form-control" type="text" name="ryadok" placeholder="Видалити все або вкажіть поле для видалення" aria-label="Delete">
            </form>
            <h4>
                <?php endif; ?>
<?php
                $fileToRead = fopen("dz_data.txt","r") or die ("Couldn't read the file");
                $id=-1;
                while (!feof($fileToRead)) {
                    $id++;
                    $delimeter = '|-|';
                    $dataFromRow = fgets($fileToRead);
                    $dataFromString = explode($delimeter, $dataFromRow);
                    if  (isset($dataFromString[1]) && (!empty($dataFromString))) {
                        echo $id.'.' . "  Email is: " . $dataFromString[0] .'<br>' ." password: " . $dataFromString[1] .'<br>' ;
                        if ((isset($_POST['delBtn'])) &&(!empty($_POST['ryadok'])) ){
                            $idr=$_POST['ryadok'];
                            $fileDel = file("dz_data.txt"); // Считываем весь файл в массив
                            for ($i = 1; $i < sizeof($fileDel); $i++)
                                if ($i == $idr) unset($fileDel[$i]);
                            $fp = fopen("dz_data.txt", "w");
                            fputs($fp, implode("", $fileDel));
                            fclose($fp);
                            header("Refresh:0");
                            fclose($fileToRead);
                            //  header("Refresh:0");
                        }
                        else if ((isset($_POST['delBtn']))  ){
                            $fp = fopen("dz_data.txt", 'a'); //Открываем файл в режиме записи
                            ftruncate($fp, 0); // очищаем файл
                            fclose($fp);
                            header("Refresh:0");
                        }
                    }
                }
 ?>
            </h4>
        </h2>
    </div>
</body>
</html>
