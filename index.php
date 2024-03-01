<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Форма обратной связи</title>
</head>
<body>

<div class="container">
    <form action="handler.php" method="post">
        <div class="input-box">
            <input type="text" name="name" placeholder="Ваше имя" />
        </div>
        <div class="input-box">
            <input type="text" name="email" placeholder="Введите email" />
        </div>
        <div class="input-box">
            <input type="text" name="tel" placeholder="Введите телефон" />
        </div>
        <div class="input-box message-box">
            <textarea name="message" placeholder="Сообщение"></textarea>
        </div>
        <div class="button">
            <input type="submit" value="Отправить" />
        </div>
    </form>
    <div id="feedbackContainer" class="feedback-container"></div>
    <div class="button" style="margin-top: 15px">
        <button id="showFeedback">Все обращения</button>
    </div>
</div>
<script>
    document.getElementById('showFeedback').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'handler.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('feedbackContainer').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
</body>
</html>