<?php
$host = "localhost";
$username = "horoshev36_prj";
$password = "123456aA==";
$database = "horoshev36_prj";

try {
    // Подключение к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>