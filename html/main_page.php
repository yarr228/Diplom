<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicly</title>
    <link rel="stylesheet" href="../css/main_page_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* CSS для сообщения об ошибке */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px; /* Добавим небольшой отступ сверху */
        }
    </style>
</head>
<body>
    <div class="main_register_container">
        <div class="main_register_text">
            <form id="LoginForm" action="login.php" method="post">
            <div class="pole_registracii_container">
                <p class="login_vvod">Логин</p>
                <input type="text" name="login">

                <p class="pass_vvod">Пароль</p>
                <input type="password" name="password">

                <!-- PHP код для вывода сообщения об ошибке -->
                <?php
                    // Проверяем, есть ли параметр error в URL
                    if (isset($_GET['error']) && $_GET['error'] === 'incorrect_credentials') {
                        echo '<p class="error-message">Неправильный логин или пароль.</p>';
                    }
                ?>

                <div class="pole_registracii_buttons_container">
                    <button type="submit">Вход</button>
                    <a href="../html/register.php">Регистрация</a>
                </div>
            </div>
            </form>
        </div>
        <div class="main_register_image">
            <img src="../images/IMG_3334.webp" height="500px" alt="">
        </div>
    </div>
    <script>
        document.getElementById('LoginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Предотвращаем отправку формы

            // Получаем значения полей
            var login = document.querySelector('input[name="login"]').value;
            var password = document.querySelector('input[name="password"]').value;
            // Проверяем, что все поля заполнены
            if (!login || !password) {
                alert('Все поля должны быть заполнены.');
                return;
            }

            // Если все проверки пройдены, отправляем форму
            this.submit();
        });
    </script>
</body>
</html>
