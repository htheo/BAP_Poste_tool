<?php

if(isset($pseudo) && $level<=3){
    if(isset($_GET['action'])){

        switch($_GET['action']){


            case 'validation':
                if(isset($_POST['id_cycle'])){
                    $id_cycle=htmlentities($_POST['id_cycle']);
                    $update_cycle=db_update('cycles_bap', array('statut'=>'fini'), array('id'=>$id_cycle));
                    if(isset($update_cycle)){
                        echo 'Validé ! <script>  window.location.href = "home/suivi-projet.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';

                    }else{
                        $tab_alerte['error']="Problème d'insertion";
                        include 'blocs/erreur.php';
                    }
                }



                break;




            case 'insert':
                if(isset($_POST['name']) AND isset($_POST['resume'])){
                    $name=htmlentities($_POST['name']);
                    $resume=htmlentities($_POST['resume']);
                    $important=htmlentities($_POST['important']);
                    $positif=htmlentities($_POST['positif']);
                    $negatif=htmlentities($_POST['negatif']);
                    $date_debut=htmlentities($_POST['date_fin']);
                    $date_fin=htmlentities($_POST['date_fin']);
                    $competences=$_POST['competence'];
                    $taches=$_POST['tache'];
                    $id_projet=htmlentities($_POST['id_projet']);
                    $id_cycle=db_insert('cycles_bap', array('id_projet' => $id_projet,'important' => $important, 'negatif'=>$negatif, 'positif'=> $positif,'name'=>$name, 'resume'=>$resume, 'date_debut'=>$date_debut, 'date_fin'=>$date_fin));

                    if($id_cycle>0){
                        foreach ($competences as $competence){
                            db_insert('link_cycle_competence', array('id_cycle'=>$id_cycle, 'id_competence'=>$competence));

                        }
                        foreach ($taches as $tache){
                            db_insert('taches', array('id_cycle'=>$id_cycle, 'name'=>$tache));

                        }
                    }else {
                        $tab_alerte['error']="Problème d'insertion";
                        include 'blocs/erreur.php';
                    }


                }

                break;





            case 'select':
                if(isset($_GET['id'])){
                    $data=db_select();
                }else{
                    $tab_alerte['error']="Pas d'article";
                    include 'blocs/erreur.php';
                }
                break;
            default:
                echo 'dommage';
                break;
        }
    }
}else{
    $tab_alerte['error']= "Vous n'avez pas les droits";
    include 'blocs/erreur.php';
}