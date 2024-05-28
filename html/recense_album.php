<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicly</title>
    <link rel="stylesheet" href="../css/recense_album_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<header class="header_container">
    <div class="menu">
        <div class="dropdown-container">
            <div class="dropdown">
                <button class="dropdown-toggle" easy-toggle="#dropdown" easy-class="show" easy-rcoe type="button">
                    <img src="../images/icons8-меню-100 (1).png" alt="Menu" width="80px">
                </button>
                <div id="dropdown" class="dropdown-menu">
                    <a href="music_page.php" class="dropdown-link">Главная</a>
                    <a href="albums.php" class="dropdown-link">Альбомы</a>
                    <a href="" class="dropdown-link">Треки</a>
                    <a href="recenses.php" class="dropdown-link">Рецензии</a>
                    <a href="" class="dropdown-link">Рейтинг</a>
                    <a href="" class="dropdown-link">О нас</a>
                </div>
            </div>
        </div>
    </div>
    <form action="">
        <div class="finder_container">
            <div class="finder">
                <img src="../images/icons8-поиск-64.png" alt="Search" width="30px">
                <input type="text" class="search-input" placeholder="Поиск">
            </div>
        </div>
    </form>
    <div class="user_header_menu">
        <div class="user-container">
            <div class="user">
                <button class="user-toggle" easy-toggle="#user" easy-class="show" easy-rcoe type="button">
                    <img src='../images/icons8-пользователь-96.png' width='80px' alt='User'>
                </button>
                <div id="user" class="user-menu">
                    <span class="user-link">
                        <?php
                        session_start();
                        if (isset($_SESSION['login'])) {
                            $username = $_SESSION['login'];
                            echo "Добро пожаловать! $username";
                        } else {
                            echo "Вы не вошли в систему.";
                        }
                        ?>
                    </span>
                    <a href="main_page.php" class="dropdown-link">Выход</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="top_description">
    <?php
    // Получаем данные из POST
    $albumId = isset($_POST['album_id']) ? intval($_POST['album_id']) : null;
    $albumName = isset($_POST['album_name']) ? htmlspecialchars($_POST['album_name']) : null;
    $artistName = isset($_POST['artist_name']) ? htmlspecialchars($_POST['artist_name']) : null;
    $albumPhoto = isset($_POST['album_photo']) ? htmlspecialchars($_POST['album_photo']) : null;

    // Вывод информации об альбоме на страницу
    if ($albumId && $albumName && $artistName && $albumPhoto) {
        echo '<div class="music_track">';
        echo '<img src="data:image/jpeg;base64,'.$albumPhoto.'"/><br>';
        echo $artistName . "<br>";
        echo $albumName . "<br>";
        echo '</div>';
    } else {
        echo "Альбом с указанным ID не найден";
    }
    ?>
    <!-- Форма для написания рецензии -->
    <form action="recense_process.php" method="post">
        <div class="resence_container">
            <h1>Напишите рецензию</h1>
            <textarea name="review" id="" rows="10"></textarea>
            <!-- Скрытые поля для передачи дополнительных данных -->
            <input type="hidden" name="album_id" value="<?php echo $albumId; ?>">
            <input type="hidden" name="album_name" value="<?php echo $albumName; ?>">
            <input type="hidden" name="artist_name" value="<?php echo $artistName; ?>">
            <input type="hidden" name="album_photo" value="<?php echo $albumPhoto; ?>">
            <div class="buttons">
                <button type="submit">Отправить</button>
                <button type="reset">Очистить</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/easy-toggler@2.2.7"></script>
</body>
</html>
