<?php
session_start();
include('db.php');

if (!isset($_GET['course_id'])) {
    echo "Cours non spécifié.";
    exit;
}

$course_id = $_GET['course_id'];

// Récupération des exercices
$stmt = $pdo->prepare("SELECT * FROM exercises WHERE course_id = ?");
$stmt->execute([$course_id]);
$exercises = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Exercices</h1>
        
        <form action="resultat.php" method="post">
            <?php foreach ($exercises as $index => $exercise): ?>
                <div class="exercise">
                    <p><strong>Question <?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($exercise['question']); ?></p>
                    <?php 
                        $answers = json_decode($exercise['answers'], true); 
                        foreach ($answers as $key => $answer): 
                    ?>
                        <div>
                            <input type="radio" id="q<?php echo $index; ?>_<?php echo $key; ?>" name="q<?php echo $exercise['id']; ?>" value="<?php echo $key; ?>" required>
                            <label for="q<?php echo $index; ?>_<?php echo $key; ?>"><?php echo htmlspecialchars($answer); ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            
            <button type="submit">Soumettre</button>
        </form>

        <a href="classe.php?classe=<?php echo htmlspecialchars($_GET['classe']); ?>">Retour</a>
    </div>
</body>
</html>
