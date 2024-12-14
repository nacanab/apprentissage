<?php
session_start();
include('db.php');

$score = 0;

foreach ($_POST as $question_id => $user_answer) {
    $question_id = str_replace('q', '', $question_id);

    $stmt = $pdo->prepare("SELECT correct_answer FROM exercises WHERE id = ?");
    $stmt->execute([$question_id]);
    $correct_answer = $stmt->fetchColumn();

    if ($correct_answer == $user_answer) {
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Résultats</h1>
        <p>Votre score : <?php echo $score; ?> bonnes réponses.</p>
        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>
</html>
