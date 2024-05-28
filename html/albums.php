    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Musicly</title>
        <link rel="stylesheet" href="../css/albums_styles.css">
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
        <div class="main_row_container">
            <div class="albums_container">
                <?php
                require_once('db.php');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM albums";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $albumPhoto = base64_encode($row['album_photo']);
                        $albumName = htmlspecialchars($row["album_name"]);
                        $artistName = htmlspecialchars($row["artist_name"]);
                        echo '<div class="albums">';
                        echo '<form action="recense_album.php" method="post">';
                        echo '<input type="hidden" name="album_id" value="'.$row['id'].'">';
                        echo '<input type="hidden" name="album_name" value="'.$albumName.'">';
                        echo '<input type="hidden" name="artist_name" value="'.$artistName.'">';
                        echo '<input type="hidden" name="album_photo" value="'.$albumPhoto.'">';
                        echo '<button type="submit" class="album-button">';
                        echo '<img src="data:image/jpeg;base64,'.$albumPhoto.'" alt="'.$albumName.'"/>';
                        echo '</button>';
                        echo '</form>';
                        echo '<span class="album_name">' . $albumName . '</span><br>';
                        echo '<span class="artist_name">' . $artistName . '</span><br>';
                        echo '</div>';
                    }
                } else {
                    echo "error";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/easy-toggler@2.2.7"></script>
    </body>
    </html>
