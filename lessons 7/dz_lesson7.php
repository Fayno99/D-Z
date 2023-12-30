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

        <?php
        if ((!empty($_POST['email']) && ($_POST['email'] == 'Hapy@new.year') && ($_POST['pass'] == '2024'))): ?>
            <div class="card" style="width: 25rem; margin: auto;">
                <img src="https://wallpapers.com/images/high/olaf-the-lovable-snowman-from-disneys-frozen-greeting-you-with-a-smile-ys11kyjvdgypw70n.webp"
                     class="card-img-top" alt="...">
                <div class="card-body" style="background-color: lightcyan; >
                    <h3>З Новим Роком та Різдвом Христовим</h3>
                </div>
            </div>
        <?php endif; ?>

        <br> <br>
        <form method="post" >
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
    </div>
</div>
</body>
</html>