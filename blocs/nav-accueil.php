<nav class="menu">
    <ul>

        <?php

        echo '<a href="'.$niveau_url.'accueil.php"><li>Accueil</li></a>';


        if (isset($pseudo)) {    //quand on est connecté
            if(isset($name_projet)){        // quand on est connecté et qu'on a un projet
                $name_projet_route=toRoute($name_projet);
                echo '<a href="'.$niveau_url.''.$name_projet_route.'/home.php"><li>'.$name_projet.'</li></a>';
            }

            echo '<a href="'.$niveau_url.'listing-projet.php"><li>Les projets BAP</li></a>';
            echo '<a href="'.$niveau_url.'creer-projet.php"><li>Créer un projet</li></a>';
            echo '<a href="'.$niveau_url.'?logout=true"><li>Déconnexion</li></a>';
        }else{

            echo '<a href="'.$niveau_url.'listing-projet.php"><li>Les projets BAP</li></a>';
            echo '<a href="'.$niveau_url.'creer-projet.php"><li>Créer un projet</li></a>';
            echo '<a href="'.$niveau_url.'connexion.php"><li>Se connecter</li></a>';
        }
        ?>

    </ul>
</nav>