<?php
if (isset($nom_projet) && isset($name_projet) && $nom_projet==toRoute($name_projet)) {


?>
<nav class="menu2">
    <ul>
        
        <?php

        if (isset($pseudo)) {
            //echo '<a href="'.$niveau_url2.'home/compte-rendu.php"><li>Compte rendu</li></a>';
            echo '<a href="'.$niveau_url2.'admin.php"><li>Espace admin</li></a>';
            echo '<a href="'.$niveau_url2.'home/suivi-projet.php"><li>Suivi de projet</li></a>';
        }
        ?>      
        
    </ul>
</nav>

<?php

}
?>