<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérification du handicap de l'utilisateur connecté
$handicap = $_SESSION['handicap'];

if ($handicap !== 'sourd'  && $handicap !== 'malvoyant') {
    header("Location: index.php");
    exit();
}
$classe = $_SESSION['classe'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Présentation des Cours de <?php echo "$classe"?> pour <?php echo "$handicap"?></title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .course-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .course-card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .course-card:hover {
      transform: translateY(-5px);
    }

    .course-image {
      height: 180px;
      background-size: cover;
      background-position: center;
    }

    .course-content {
      padding: 15px;
    }

    .course-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin: 0 0 10px;
    }

    .course-description {
      font-size: 14px;
      color: #666;
      margin-bottom: 15px;
    }

    .course-button {
      display: inline-block;
      padding: 10px 15px;
      background-color: #007bff;
      color: #ffffff;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .course-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>


    <?php include('nav.php'); ?>

  <div class="container">
    <h1>Nos Cours Disponibles</h1>
    <div class="course-list">
      <div class="course-card">
        <div class="course-content">
          <h3 class="course-title">Mathématiques</h3>
          <p class="course-description">Thème : Les fractions</p>
          <p>Apprenez à manipuler les fractions : addition, soustraction, multiplication et division.</p>
          <a href="exercice.php?subject=maths&classe=<?php echo $classe; ?>" class="button" style="text-align:center;">Voir les exercices</a>
        </div>
      </div>



      <div class="course-card">
        <div class="course-content">
          <h3 class="course-title">Français</h3>
          <p class="course-description">Thème : Les types de phrases</p>
          <p>Découvrez les phrases déclaratives, interrogatives, impératives et exclamatives.</p>
          <a href="exercice.php?subject=francais&classe=<?php echo $classe; ?>" class="button" style="text-align:center;">Voir les exercices</a>
        </div>
      </div>



      <div class="course-card">
        <div class="course-content">
          <h3 class="course-title">SVT</h3>
          <p class="course-description">Thème : Le corps humain</p>
          <p>Explorez les différents systèmes du corps humain et leur fonctionnement.</p>
          <a href="exercice.php?subject=svt&classe=<?php echo $classe; ?>" class="button" style="text-align:center;">Voir les exercices</a>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
        <p>&copy; 2024 Apprentissage en ligne</p>
</footer>
</html>
