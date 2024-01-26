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
$sql = "SELECT d.name as dishes, d.price, d.description FROM dishes d WHERE d.category LIKE 'Бургеры'";
$result = $conn->query($sql);

// Создание кнопок на основе категорий
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">
                <img src="1.png" alt="" class="img">
                <button class="btn" id="btn' . $row["id"] . '">' . $row["dishes"] . '</button>
            </div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>