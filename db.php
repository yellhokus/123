<?php
$host = 'localhost';
$db = 'survey_app';
$user = 'root';
$pass = ''; // Введіть свій пароль до MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}
?>
