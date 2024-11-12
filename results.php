<?php
include 'db.php';

$survey_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM surveys WHERE id = ?");
$stmt->execute([$survey_id]);
$survey = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM answers WHERE survey_id = ?");
$stmt->execute([$survey_id]);
$answers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Результати опитування - <?php echo htmlspecialchars($survey['title']); ?></title>
</head>
<body>
    <h2>Результати опитування "<?php echo htmlspecialchars($survey['title']); ?>" - Vladyslav Plakhotniuk</h2>
    <ul>
        <?php foreach ($answers as $answer): ?>
            <li><?php echo htmlspecialchars($answer['answer_text']); ?>: <?php echo $answer['votes']; ?> голосів</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
