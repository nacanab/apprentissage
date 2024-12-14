<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérification du handicap de l'utilisateur connecté
$handicap = $_SESSION['handicap'];
$classe = $_SESSION['classe'];
$name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('nav.php'); ?>

    <div class="container">
        <h1>Bienvenue sur votre tableau de bord</h1>
        <div class="a">
        <p>
            Nom:<?php echo "$name"?><br>
            Classe:<?php echo "$classe"?><br>
            Handicap:<?php echo "$handicap"?><br>
        </p>
        </div>
        
        <?php if ($handicap === 'sourds') { ?>
            <h2>Cours de <?php echo "$classe"?> pour les Sourds</h2>
            <div class="b"><ul>
                <li><a href="classes_sourds.php" class="button">Accéder aux cours</a></li>
            </ul></div>
        <?php } elseif ($handicap === 'malvoyant') { ?>
            <h2 style="color:red">Cours de <?php echo "$classe"?> pour les Malvoyants</h2>
            <div class="b"><ul>
                <li><a href="classes_malvoyant.php" class="button">Accéder aux cours</a></li>
            </ul></div>
        <?php } else { ?>
            <h2>Cours de <?php echo "$classe"?> classiques</h2>
            <div class="b"><ul>
                <li><a href="classes.php" class="button">Accéder aux cours</a></li>
            </ul></div>
        <?php } ?>
        </div>
</body>
</html>
