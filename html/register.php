<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register_styles.css">
    <title>Musicly</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <form id="registrationForm" action="register_process.php" method="post">
        <div class="main_register_container">
            <div class="main_register_text">
                <div class="pole_registracii_container">
                    <p class = "login_vvod">Логин</p>
                    <input type="text" name="login">

                    <p class = "pass_vvod">Пароль</p>
                    <input type="password" name="pass">

                    <p class = "pass_vvod">Повтор пароля</p>
                    <input type="password" name="repeatpass">

                    <div class="pole_registracii_buttons_container">
                        <button type="submit">Регистрация</button>
                    </div>
                    <div class = "alreadyvhod_container">
                        <p>Уже есть аккаунт?</p>
                        <button><a href="../html/main_page.php">Вход</a></button>
                    </div>
                </div>
            </div>
            <div class="main_register_image">
                <img src="../images/IMG_3334.webp" height="500px" alt="">
            </div>
        </div>
    </form>
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Предотвращаем отправку формы

            // Получаем значения полей
            var login = document.querySelector('input[name="login"]').value;
            var password = document.querySelector('input[name="pass"]').value;
            var repeatPassword = document.querySelector('input[name="repeatpass"]').value;

            // Проверяем, что все поля заполнены
            if (!login || !password || !repeatPassword) {
                alert('Все поля должны быть заполнены');
                return;
            }

            // Проверяем совпадение паролей
            if (password !== repeatPassword) {
                alert('Пароли не совпадают');
                return;
            }

            // Если все проверки пройдены, отправляем форму
            this.submit();
        });
    </script>
</body>
</html>