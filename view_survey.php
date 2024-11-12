<?php
include 'db.php';

$survey_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM surveys WHERE id = ?");
$stmt->execute([$survey_id]);
$survey = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM answers WHERE survey_id = ?");
$stmt->execute([$survey_id]);
$answers = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer_id = $_POST['answer'];
    $stmt = $pdo->prepare("UPDATE answers SET votes = votes + 1 WHERE id = ?");
    $stmt->execute([$answer_id]);
    echo "Дякуємо за вашу відповідь!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($survey['title']); ?></title>
</head>
<body>
    <h2><?php echo htmlspecialchars($survey['title']); ?> - Vladyslav Plakhotniuk</h2>
    <p><?php echo htmlspecialchars($survey['description']); ?></p>

    <form method="POST">
        <?php foreach ($answers as $answer): ?>
            <input type="radio" name="answer" value="<?php echo $answer['id']; ?>" required>
            <?php echo htmlspecialchars($answer['answer_text']); ?><br>
        <?php endforeach; ?>
        <button type="submit">Проголосувати</button>
    </form>
</body>
</html>
