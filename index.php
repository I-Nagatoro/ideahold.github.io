<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div>
			<button class="btn" id="burger"><"Бургеры"></button>
		</div>
        <div class="inner">
            <?php
            // Подключение к базе данных
            $servername = "localhost";
            $username = "root";
            $password = "vertrigo";
            $dbname = "delevery";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Проверка соединения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Запрос к базе данных для получения категорий
            $sql = "SELECT id, category_name FROM categories";
            $result = $conn->query($sql);

            // Создание кнопок на основе категорий
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item">
                            <img src="1.png" alt="" class="img">
                            <button class="btn" id="btn'.$row["id"].'">'. $row["category_name"].'</button><br>
                        </div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
	<div class="usercard" id="usercard">
		
	</div>

	<script src="https://telegram.org/js/telegram-web-app.js"></script>
	<script src="app.js"></script>
</body>
</html>