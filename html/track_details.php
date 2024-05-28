<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicly</title>
    <link rel="stylesheet" href="../css/track_details_styles.css">
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
                        <a href="" class="dropdown-link">Альбомы</a>
                        <a href="" class="dropdown-link">Треки</a>
                        <a href="" class="dropdown-link">Мои рецензии</a>
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
    <div class="main_container">
        <div class="description_container">
            <div class="top_description">
                <?php
                    require_once('db.php');
                    // Проверка соединения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Проверяем, был ли передан ID трека
                    $track_id = isset($_GET['track_id']) ? intval($_GET['track_id']) : 1;

                    // Выполнение запроса к базе данных
                    $sql = "SELECT * FROM music_tracks WHERE id = $track_id";
                    $result = $conn->query($sql);

                    // Вывод данных на страницу
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<div class="music_track">';
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/><br>';
                        echo $row["artist_name"]. "<br>";
                        echo '</div>';
                    } else {
                        echo "Трек с указанным ID не найден";
                    }
                ?>
            </div>
            <h1>Биография</h1>
            <div class="bot_description">
                <?php
                    require_once('db.php');
                    // Проверка соединения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Выполнение запроса к базе данных для получения описания
                    $sql = "SELECT description FROM music_tracks WHERE id = $track_id";
                    $result = $conn->query($sql);

                    // Вывод данных на страницу
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["description"];
                    } else {
                        echo "Описание для указанного трека не найдено";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/easy-toggler@2.2.7"></script>
</body>
</html>
