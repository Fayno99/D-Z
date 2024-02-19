<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['Admin'])) {
    header("location: Login.php");
}
require_once ('db.php');
//require_once ('Login.php');
$pdo = getPDO();
//showAndDie($messages);
//showAndDie(getAllMesages($con));
$getSetLoginOnline = getIsSetLognOnline($pdo, $_SESSION['Admin'] );
if (!empty($_SESSION['Admin'])&& !$getSetLoginOnline ){
    addOnlineUser($pdo, $_SESSION['Admin']);
}


$getOnlineUsers= getOnlineUsers($pdo);
$pdo= null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DZ_13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <script>
        function BluurWord() {
            var checkBox = document.getElementById("myCheck"); // Get the checkbox
            let forbiddenWord;  // If the checkbox is checked, display the output text
            if (checkBox.checked === true) {
                forbiddenWord = "заборона";
            } else {
                forbiddenWord = null;
            }
            //  console.log(forbiddenWord)
            return forbiddenWord
        }
        $(document).ready(function() {  // Завантаження повідомлення при завантаженні сторінки
            loadMessages();

            $('#myCheck').change(function() {  // Перевірка повідомлення, коли стан чекбоксу змінюється
                loadMessages();
            });

            function loadMessages() {
                $.ajax({
                    url: 'messages.php',
                    method: 'GET',
                    success: function (request) {
                        if (request.data) {
                            let forbiddenWord = BluurWord();
                            $("#list-of-messages").empty();  // Очистка списока повідомлень
                            request.data.map(function (comment) {
                                appendComment(comment.login, comment.timestamp, comment.chat, comment.ID, forbiddenWord)
                            })
                        }
                    }
                })
            }

            function appendComment(login, timestamp, chat, ID, forbiddenWord) {
                let isAdmin = "<?php echo $_SESSION['Admin']; ?>";
                let del = isAdmin === 'Admin' ? "<a href='#' data-id='" + ID + "' class='delete-button' id='hide-x'>X</a> " : "";
                if (chat.includes(forbiddenWord)) {
                    chat = chat.replace(new RegExp(forbiddenWord, 'g'), '********');
                }
                $("#list-of-messages").append(
                    "<li class='list-group-item'><strong>" + login + "</strong>" + " " + timestamp + ": " + chat + " " + del + " </li>"
                );
            }

            $("form").submit(function(event){
                event.preventDefault();
                let date = new Date();
                let formattedDate = date.toISOString().slice(0,19).replace("T", " ");
                let data1 = $(this).serialize();
                let data2 ={
                    Admin: "<?php echo $_SESSION['Admin']; ?>",
                    data:formattedDate,
                    mes: $(this).find('input[name="mes"]').val()
                };
                console.log('Variant 1 :'+ data1)
                console.log('Variant 2 :')
                console.log(data2)
                $.ajax({
                    url:'newMessages.php',
                    method: 'POST',
                    data: data2,
                    success: function(request){
                        appendComment(data2.Admin,data2.data,data2.mes);
                        $('form').trigger("reset");
                    }
                })
            })
            //видалення повідомлення
            $(document).on("click", ".delete-button", function() {
                let messageId = $(this).data('id'); // витягуємо ID воно повинно бути маленькими літерами
                let messageElement = $(this).closest('li');
                $.ajax({
                    url: 'deleteMessage.php',
                    type: 'GET',
                    data: {
                        'delete_message': messageId
                    },
                    success: function(response) {
                        messageElement.remove();  // Оновлення  інтерфейсу користувача після видалення
                    }
                });
            });
            //вихід з чату
            $("button[name='btnOut']").click(function(event){
                event.preventDefault();
                $.ajax({
                    url:'logout.php', // URL, який обробляє вихід на сервері
                    method: 'POST',
                    success: function(response){
                        // Перенаправте користувача на сторінку входу після виходу
                        window.location.href = "./Login.php";
                    }
                })
            });
        });

    </script>

</head>
<body class="p-3 mb-2  bg-dark">
<div class="container " style="width: 40rem; margin: auto; ">
    <br><br>
    <div class="p-3 mb-2 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;">
        <div class="card" style="...">
            <div class="card-header" > Chat</div>
            <ul class="list-group list-group-flush" id="list-of-messages"> </ul>
        </div>
        <form method="post" id="form">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Текст повідомлення</label>
                <input type="text" class="form-control" name="mes" id="exampleInputPassword1">
            </div>
            <button type="submit"  name="btn" class="btn btn-primary">Відправити</button>
            <button type="submit"  name="btnOut" class="btn btn-primary">Вийти</button>
        </form>
        <br>
    </div>
    <br><br>
    <div class="p-4 mb-3 position-center" style="background-color: slategray; border-radius: 20px;border-color: aqua;"> Натисніть щоб приховати слово: заборона
        <input type="checkbox" id="myCheck" onclick="BluurWord()">
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