<nav class="menu">
    <ul>
        
        <?php

        echo '<li><a href="home.php">Accueil</a></li>';
        if (isset($pseudo)) {
            echo '<li><a href="admin.php">Espace admin</a></li>';
            echo '<li><a href="?logout=true">Déconnexion</a></li>';
        }else{
            echo '<li><a href="connexion.php">Se connecter</a></li>';
        }
        ?>      
        
    </ul>
</nav>