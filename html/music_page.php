<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicly</title>
    <link rel="stylesheet" href="../css/music_page_styles.css">
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
    <div class="main_container">
        <button id="scroll-left" class="scroll-button"><img src="../images/icons8-стрелка-вправо-100 (1).png" alt="" width="40px"></button>
        <div class="main_row_container">
            <div class="column_container">
                <?php
                    require_once('db.php');
                    // Проверка соединения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Выполнение запроса к базе данных
                    $sql = "SELECT * FROM music_tracks";
                    $result = $conn->query($sql);

                    // Вывод данных на страницу
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="music_track">';
                            echo '<a href="track_details.php?track_id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/></a><br>';
                            echo $row["artist_name"]. "<br>";
                            echo $row["track_name"];
                            echo '</div>';
                        }
                    } else {
                        echo "error";
                    }
                    $conn->close();
                ?>
            </div>
        </div>
        <button id="scroll-right" class="scroll-button"><img src="../images/icons8-стрелка-вправо-100.png" alt="" width="40px"></button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/easy-toggler@2.2.7"></script>
    <script>
        document.getElementById('scroll-left').addEventListener('click', function() {
            document.querySelector('.main_row_container').scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        document.getElementById('scroll-right').addEventListener('click', function() {
            document.querySelector('.main_row_container').scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>