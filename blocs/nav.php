<nav class="menu">
    <ul>
        
        <?php

        echo '<a href="home.php"><li>Accueil</li></a>';
        if (isset($pseudo)) {
            echo '<a href="admin.php"><li>Espace admin</li></a>';
            echo '<a href="?logout=true"><li>Déconnexion</li></a>';
        }else{
            echo '<a href="connexion.php"><li>Se connecter</li></a>';
        }
        ?>      
        
    </ul>
</nav>