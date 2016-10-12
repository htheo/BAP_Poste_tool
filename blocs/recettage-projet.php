<?php
if (isset($pseudo) && isset($donnees_projet[0])) {
    ?>
    <div class="listing_projet">
        <div class="bandeau_cycle">
            <a href="projet-en-cours.php" class="rotate"><img src="../../img/arrow.svg" alt="fleche" title="voir l'étape 1 de préparation"></a>
            <h1>Finalisation du projet - Recettage</h1>
           </div>

        <div class="statistique">
            <h2>Statistiques</h2>

            <?php
            $nb_cycles=db_select('SELECT COUNT("id") FROM cycles_bap WHERE id_projet='.$donnees_projet[0]['id']);
            $nb_cycles = $nb_cycles[0]['COUNT("id")'];

            echo '<h3>Nombre de cycles finies : '.$nb_cycles.'</h3>';

            $cycles=db_select('SELECT * FROM cycles_bap WHERE id_projet='.$donnees_projet[0]['id']);
            $nb_graphisme=0;
            $nb_dev=0;
            $nb_market=0;
            foreach ($cycles as $cycle){
                $link_competences = db_select('SELECT * FROM link_cycle_competence WHERE id_cycle='.$cycle["id"]);
                foreach ($link_competences as $link_competence){
                    $id_competence=$link_competence["id_competence"];
                    switch ($id_competence){
                        case 1:
                            $nb_market++;
                            break;
                        case 2 :
                            $nb_dev++;
                            break;
                        case 3:
                            $nb_graphisme++;
                            break;
                        default:
                            break;
                    }
                }
            }
            echo '<p>Nombre de cycles ou nous avons fais du marketing : '.$nb_market.'</p>';
            echo '<p>Nombre de cycles ou nous avons fais du développement : '.$nb_dev.'</p>';
            echo '<p>Nombre de cycles ou nous avons fais du graphisme : '.$nb_graphisme.'</p>';
            $numero_cycle=0;
            $nb_tache_en_cours=0;
            $nb_tache_fait=0;
            $nb_tache_non_fait=0;
            foreach ($cycles as $cycle){
                $numero_cycle=$numero_cycle++;
                $taches = db_select('SELECT * FROM taches WHERE id_cycle='.$cycle["id"]);
                foreach ($taches as $tache){
                    $statut=$tache["statut"];
                    switch ($statut){
                        case 'en_cours':
                            $nb_tache_en_cours++;
                            break;
                        case 'fait' :
                            $nb_tache_fait++;
                            break;
                        case 'non_fait':
                            $nb_tache_non_fait++;
                            break;
                        default:
                            break;
                    }
                }
            }
            echo '<p>Nombre de taches encore en cours : '.$nb_tache_en_cours.'</p>';
            echo '<p>Nombre de taches validées : '.$nb_tache_fait.'</p>';
            if($nb_tache_non_fait==0){
                echo '<p>Nickel ! Toutes les taches ont été validées ou sont encore en cours</p>';
            }else {
                echo '<p>Nombre de taches non validée : '.$nb_tache_non_fait.'</p>';
            }

            ?>
            <div class="export">
                <a href="../admin.php?panel=export-pdf"><div class="button-recettage"><i class="export-icon"></i>Exporter le recettage</div></a>
                <a href="../../<?php echo $donnees_projet[0]['cdc_link'] ?>"><div class="button-recettage"><i class="export-icon"></i>Exporter le cahier des charges</div></a>
                <?php if($donnees_projet[0]['gantt_link'] != ""){ ?>
                    <a href="../../<?php echo $donnees_projet[0]['gantt_link'] ?>"><div class="button-recettage"><i class="export-icon"></i>Exporter le planning de Gantt</div></a>
                    <?php
                }?>
            </div>
        </div>

    </div>
    <?php
}
?>