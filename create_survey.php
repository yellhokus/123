<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $answers = $_POST['answers'];

    $stmt = $pdo->prepare("INSERT INTO surveys (title, description) VALUES (?, ?)");
    $stmt->execute([$title, $description]);
    $survey_id = $pdo->lastInsertId();

    foreach ($answers as $answer) {
        $stmt = $pdo->prepare("INSERT INTO answers (survey_id, answer_text) VALUES (?, ?)");
        $stmt->execute([$survey_id, $answer]);
    }
    
    echo "Опитування створено!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Створення опитування</title>
</head>
<body>
    <h2>Створення опитування - Vladyslav Plakhotniuk</h2>
    <form method="POST">
        <label>Назва опитування:</label><br>
        <input type="text" name="title" required><br><br>
        
        <label>Опис:</label><br>
        <textarea name="description" required></textarea><br><br>
        
        <label>Варіанти відповідей (по одному на рядок):</label><br>
        <textarea name="answers[]" required></textarea><br>
        <textarea name="answers[]" required></textarea><br>
        
        <button type="submit">Створити опитування</button>
    </form>
</body>
</html>
