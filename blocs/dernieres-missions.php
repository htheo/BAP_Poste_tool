<div class="listing_projet">
    <h3>Où on en est ?</h3>
    <?php
    $select_cycles_en_cours=db_select('SELECT * FROM cycles_bap WHERE statut="en_cours" && id_projet='.$donnees_projet[0]["id"]);
    if(isset($select_cycles_en_cours[0])){ //si il y a un cycle en cours
        $select_cycle_en_cours= $select_cycles_en_cours[0];
        $competences_cycle_fini=get_competences_from_cycle($select_cycle_en_cours["id"]);
        $taches_cycle_fini=get_taches_from_cycle($select_cycle_en_cours["id"]);

        echo '<div class="cycle cycle_en_cours"><h2>'.$select_cycle_en_cours["name"].' - '.convertir_date($select_cycle_en_cours["date_debut"]).' => '.convertir_date($select_cycle_en_cours["date_fin"]).'</h2>
            <p>'.$select_cycle_en_cours["resume"].'</p>';

        if($level==1){
            if($select_cycle_en_cours["positif"]!=""){

                echo ' <img src="../img/positif.svg" alt="icone attention"><p class="competence">'.$select_cycle_en_cours["positif"].'</p><br>';
            }
            if($select_cycle_en_cours["negatif"]!=""){
                echo ' <img src="../img/negatif.svg" alt="icone attention"><p class="competence">'.$select_cycle_en_cours["negatif"].'</p><br>';

            }
        }
        echo '
            <h3>Compétences : </h3>';

        foreach ($competences_cycle_fini as $competence_cycle_fini=>$value){
            echo '<img src="../img/'.$value.'.svg" alt="'.$value.'"><p class="competence">'.$value.'</p><br>';
        }

        echo '<h3>Taches : </h3>';

        foreach ($taches_cycle_fini as $tache_cycle_fini){
            echo '<div><img class="pad" src="../img/tache.svg" alt="icone de taches"><p class="competence">'.$tache_cycle_fini['name'].'</p>';

            if($tache_cycle_fini["statut"]=="en_cours"){
                echo '<img class="tourne" src="../img/en_cours.svg" alt="icone etat tache">';
            }else{
                echo '<img src="../img/fait.svg" alt="icone etat tache">';
            }
            echo '</div>';
        }

        echo '</div>
        <div class="statut statut_en_cours">
           <h4>Ce cycle est en cours</h4>
        </div>';






    }

    ?>
</div>