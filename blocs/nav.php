<nav class="menu">
    <ul>
        
        <?php

        echo '<a href="'.$niveau_url.'accueil.php"><li>Accueil</li></a>';
        echo '<a href="'.$niveau_url.'listing-projet.php"><li>Les projets BAP</li></a>';
        if (isset($pseudo)) {
            echo '<a href="'.$niveau_url2.'home/compte-rendu.php"><li>Compte rendu</li></a>';
            echo '<a href="'.$niveau_url2.'admin.php"><li>Espace admin</li></a>';
            echo '<a href="'.$niveau_url.'?logout=true"><li>Déconnexion</li></a>';
        }else{
            echo '<a href="'.$niveau_url.'connexion.php"><li>Se connecter</li></a>';
        }
        ?>      
        
    </ul>
</nav>