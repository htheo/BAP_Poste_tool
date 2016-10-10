<?php
if(isset($pseudo) && isset($donnees_projet[0])){
echo '<div class="listing_projet">
<div class="bandeau_cycle">
    <a href="start-projet.php" class="rotate"><img src="../../img/arrow.svg" alt="fleche" title="voir l\'étape 1 de préparation"></a>
    <h1>Projet en développement - Liste des cycles</h1>
    <a href=""><img src="../../img/arrow.svg" alt="fleche" title="voir le recettage"></a>
</div>';
// on récupère les cycle et on les affiche et on peut les modifier

    if(isset($select_cycles_fini[0])){ //si il y a des cycles finis
        foreach ($select_cycles_fini as $select_cycle_fini){

            $competences_cycle_fini=get_competences_from_cycle($select_cycle_fini["id"]);
            $taches_cycle_fini=get_taches_from_cycle($select_cycle_fini["id"]);
            if($select_cycle_fini["important"]!=""){
                echo '<div class="cycle cycle_fini important">';
            }else{
                echo '<div class="cycle cycle_fini">';
            }
            echo '
            <h2>'.$select_cycle_fini["name"].' - '.$select_cycle_fini["date_debut"].' '.$select_cycle_fini["date_fin"].'</h2>
            <p>'.$select_cycle_fini["resume"].'</p>';
            if($select_cycle_fini["important"]!=""){
                echo ' <img src="../../img/important.svg" alt="icone attention"><p class="competence">'.$select_cycle_fini["important"].'</p>';
            }
            if($level<=1){
                if($select_cycle_fini["positif"]!=""){
                    echo ' <img src="../../img/positif.svg" alt="icone attention"><p class="competence">'.$select_cycle_fini["positif"].'</p>';
                }
                if($select_cycle_fini["negatif"]!=""){
                    echo ' <img src="../../img/negatif.svg" alt="icone attention"><p class="competence">'.$select_cycle_fini["negatif"].'</p>';

                }
            }
        echo '
            <h3>Compétences : </h3>';

            foreach ($competences_cycle_fini as $competence_cycle_fini=>$value){
                echo '<img src="../../img/'.$value.'.svg" alt="'.$value.'"><p class="competence">'.$value.'</p><br>';
            }

            echo '<h3>Taches : </h3>';

            foreach ($taches_cycle_fini as $tache_cycle_fini=>$value_tache_cycle_fini){
                echo '<div class=""><img src="../../img/tache.svg" alt="icone de taches"><p class="competence">'.$value_tache_cycle_fini.'</p> </div>';
            }

            echo '
            
            <h3>Ce cycle est terminé</h3>
           

            </div>';
        }
    }




    if(isset($select_cycles_en_cours[0])){ //si il y a un cycle en cours
        $select_cycle_en_cours= $select_cycles_en_cours[0];
        $competences_cycle_fini=get_competences_from_cycle($select_cycle_en_cours["id"]);
        $taches_cycle_fini=get_taches_from_cycle($select_cycle_en_cours["id"]);

        echo '<div class="cycle cycle_en_cours">
            <h2>'.$select_cycle_en_cours["name"].' - '.$select_cycle_en_cours["date_debut"].' '.$select_cycle_en_cours["date_fin"].'</h2>
            <p>'.$select_cycle_en_cours["resume"].'</p>';
            if($select_cycle_en_cours["important"]!=""){
                echo ' <img src="../../img/important.svg" alt="icone attention"><p class="competence">'.$select_cycle_fini["important"].'</p><br>';
            }
        if($level<=1){
            if($select_cycle_en_cours["positif"]!=""){

                echo ' <img src="../../img/positif.svg" alt="icone attention"><p class="competence">'.$select_cycle_en_cours["positif"].'</p><br>';
            }
            if($select_cycle_en_cours["negatif"]!=""){
                echo ' <img src="../../img/negatif.svg" alt="icone attention"><p class="competence">'.$select_cycle_en_cours["negatif"].'</p><br>';

            }
        }
        echo '
            <h3>Compétences : </h3>';

        foreach ($competences_cycle_fini as $competence_cycle_fini=>$value){
            echo '<img src="../../img/'.$value.'.svg" alt="'.$value.'"><p class="competence">'.$value.'</p><br>';
        }

        echo '<h3>Taches : </h3>';

        foreach ($taches_cycle_fini as $tache_cycle_fini=>$value_tache_cycle_fini){
            echo '<div class=""><img src="../../img/tache.svg" alt="icone de taches"><p class="competence">'.$value_tache_cycle_fini.'</p> </div>';
        }

        echo '
            <form action="../admin.php?action=validation&panel=edit-cycle" method="post">
                <input type="hidden" name="id_cycle" value="'.$select_cycle_en_cours["id"].'">
                <input type="submit" value="Valider le cycle">
            </form>

        </div>';
        echo'<p>Vous devez valider un cycle pour en créer un nouveau</p>';






    }else{                              //créer votre nouveau cycle
        echo '<div class="cycle">
            <h2>Créer votre nouveau cycle</h2>
            <form action="../admin.php?action=insert&panel=edit-cycle" method="post">
                <input type="text" name="name" placeholder="Titre du cycle">
                <input type="hidden" name="id_projet" value="'.$donnees_projet[0]['id'].'">
                <textarea type="text" name="resume" placeholder="Brief du cycle">
                
                </textarea>
                
                <input type="text" name="important" placeholder="Information importante sur un gros changement !">
                <input type="text" name="positif" placeholder="Points positifs de ce cycle">
                <input type="text" name="negatif" placeholder="Points négatis de ce cycle">
                
                ';
        $competences = get_competences();

        echo '<p>Compétences requises pour le cycle</p>';
        foreach ($competences as $competence){
            echo '<input type="checkbox" name="competence[]" id="'.$competence["name"].'" value="'.$competence["id"].'"> <label for="'.$competence["name"].'">'.$competence["name"].'</label><br>';

        }
        echo '<p>Taches à réaliser pour ce cycle</p>';
        for($j=1;$j<=5;$j++){
            echo '<input type="text" name="tache[]" placeholder="Tache n°'.$j.' à réaliser">';
        }
        echo '
               <label for="date_debut">Date de début</label><input id="date_debut" type="date" name="date_debut" value="'.date("Y-m-d").'">
               <label for="date_fin">Date de fin</label><input id="date_fin" type="date" name="date_fin" value="'.date("Y-m-d").'">
            

        <input type="submit" value="Créer votre cycle">
        </form>
        </div>';
    }
    //créer un cycle avec des taches si ils sont tous fini




echo '</div>';


}
?>