<!DOCTYPE html>
<?php
session_start();
?>
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
        if (!empty($_POST['email'])){
        $_SESSION['is_registered'] = true;
        $id = count($_SESSION['user'] ?? []);
        $_SESSION['last_id']=$id;
            $_SESSION['last_id']=$id;
            $_SESSION['user'][$id] = [
                'email'=>$_POST['email'],
            ];
        ?>
        <?php
 //session_destroy();
        } ?>
           <?php
        if (!($_SESSION['is_registered'] ?? false)):
        ?>
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
    else:
    ?>
    <div class="p-4 mb-3 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <h2>Користувачі які вже зареєструвались
            <span class="badge bg-secondary">
     <?php
     endif;
     ?>

                <?php
                      $displayed_emails = [];
                      if((isset($_SESSION['user'])) && (!empty($_POST['email'])) ){
                          foreach($_SESSION['user'] as $user) {
                              // Перевірка, чи існує електронна адреса та чи не була вона вже виведена
                              if(isset($user['email']) && !in_array($user['email'], $displayed_emails)) {
                                  echo "<br>". $user['email'] . "<br>";
                                  // Додавання емейлу до масиву виведених емейлів
                                  $displayed_emails[] = $user['email'];
                              }
                          }
                      }
     //session_destroy(); ?>
                </span></h2>
    </div>

</body>
</html>