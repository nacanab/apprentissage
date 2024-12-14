<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $handicap = $_POST['handicap'];
    $classe = $_POST['classe'];

    // Vérifier si l'e-mail existe déjà
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        // L'e-mail existe déjà
        echo "Cet e-mail est déjà enregistré. Veuillez utiliser un autre e-mail ou vous connecter.";
        exit;
    }

    // Insérer les données si l'e-mail n'existe pas
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, handicap, classe) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$username, $email, $password, $handicap, $classe])) {
        header("Location: login.php");
        exit;
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme d'apprentissage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur la plateforme d'apprentissage</h1>
        <form action="register.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="handicap">Type de handicap :</label>
            <select id="handicap" name="handicap" required>
                <option value="aucun">Aucun</option>
                <option value="sourd">Sourd</option>
                <option value="malvoyant">Malvoyant</option>
            </select>

            <label for="classe">Classe :</label>
            <select id="classe" name="classe" required>
                <option value="6em">6e</option>
                <option value="5em">5e</option>
            </select>

            <button type="submit">Créer un compte</button>
        </form>
    </div>
</body>
</html>

