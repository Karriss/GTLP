<?php
include 'connect.php'; // Подключение к базе данных

// Получаем ID страны из GET-параметра
$country_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Запрос к базе данных для получения информации о стране
try {
    $stmt = $conn->prepare("SELECT * FROM countries WHERE id = :id");
    $stmt->execute(['id' => $country_id]);
    $country = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$country) {
        die("Страна не найдена.");
    }
} catch (PDOException $e) {
    die("Ошибка при получении данных: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($country['name']); ?></title>
    <link rel="stylesheet" href="styles.css"> <!-- Подключи стили, если нужно -->
</head>
<body>
    <h1><?php echo htmlspecialchars($country['name']); ?></h1>
    <p><?php echo htmlspecialchars($country['description']); ?></p>
    <!-- Добавь другие поля, которые тебе нужны -->
</body>
</html>