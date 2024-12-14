<nav>
        <a href="index.php" class="logo">EduLibre</a>
          <ul>
            <button class="bouton3"><a href="index.php"><span>Accueil</span></a></button>
            <?php if (isset($_SESSION['user_id'])): ?>
                <button class="bouton3"><a href="dashboard.php"><span>Tableau de bord</span></a></button>
                <button class="bouton3"><a href="logout.php"><span>Déconnexion</span></a></button>
            <?php else: ?>
                <button class="bouton3"><a href="register.php"><span>Inscription</span></a></button>
                <button class="bouton3"><a href="login.php"><span>Connexion</span></a></button>
            <?php endif; ?>
        </ul>   
</nav>