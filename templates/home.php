<?php
include 'blocs/header-start.php';
include 'blocs/nav-accueil.php';
include 'blocs/nav.php';

    if(isset($donnees_url)){
        if(isset($id)){
            $id_user_admin=db_select('SELECT role FROM link_projet_user WHERE id_projet='.$donnees_projet[0]['id'].' && id_user='.$id);

            if(isset($id_user_admin[0])){
                $level=$id_user_admin[0]['role'];
            }
        }


        switch ($donnees_url){
            case 'compte-rendu.php':
                if($level<=3){
                    echo '
                    <div class="titre">
                        <h1>Listing des comptes rendus</h1>
                    </div>';
                    $compte_rendus = db_select('SELECT * FROM posts');
                    foreach ($compte_rendus as $compte_rendu){
                        include 'blocs/show-compte-rendu.php';
                    }
                }else{
                    $tab_alerte['error']="Vous n'avez pas le droits";
                    include 'blocs/erreur.php';
                }
                break;
            case 'start-projet.php':
                include 'blocs/start-projet.php';
                break;
            case 'projet-en-cours.php':
                include 'blocs/en-cours-projet.php';
                break;
            case 'suivi-projet.php':
                if($level<=3){
                    $statut_bap=$donnees_projet[0]['statut'];
                    switch ($statut_bap){
                        case 'start':
                            include 'blocs/start-projet.php';
                            break;
                        case 'en_cours':
                            $select_cycles_fini=db_select('SELECT * FROM cycles_bap WHERE statut="fini" && id_projet='.$donnees_projet[0]["id"]);
                            $select_cycles_en_cours=db_select('SELECT * FROM cycles_bap WHERE statut="en_cours" && id_projet='.$donnees_projet[0]["id"]);
                            include 'blocs/en-cours-projet.php';
                            break;
                        case 'recettage':
                            break;
                        case 'fini':
                            break;
                        default:
                            break;
                    }
                }

                break;
            default:
                $tab_alerte['error']="Page inexistante";
                include 'blocs/erreur.php';
                break;
        }
    }
    else if(isset($_GET['panel'])){
        switch ($_GET['panel']) {
            case 'creer-projet':
                include 'forms/edit-projet-v.php';
                break;
            case 'connexion':
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    $pseudo=htmlentities($_POST['pseudo']);
                    $password=htmlentities($_POST['password']);
                    include 'forms/connexion-v.php';
                }else{
                    $tab_alerte['error']="erreur";
                    header('Location: connexion.php');
                }

                break;
            case 'inscription':
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    $pseudo=htmlentities($_POST['pseudo']);
                    $password=htmlentities($_POST['password']);
                    include 'forms/inscription-v.php';
                }else{
                    $tab_alerte['error']="Problème lors de l'inscription";
                    include 'blocs/erreur.php';
                }
                break;

            default:
                if(isset($donnees_projet[0])) {
                    $cdps = get_cdp_from_projet($donnees_projet[0]['id']);
                    $techniciens = get_technicien_from_projet($donnees_projet[0]['id']);
                    include 'blocs/default.php';

                    if ($level <= 3) {
                        include 'blocs/dernieres-missions.php';
                    }
                }else{
                    $tab_alerte['error']="Il n'y a pas de projet à ce nom";
                    include 'blocs/erreur.php';
                }
                break;
        }
    }else{
        if(isset($donnees_projet[0])) {
            $cdps = get_cdp_from_projet($donnees_projet[0]['id']);
            $techniciens = get_technicien_from_projet($donnees_projet[0]['id']);
            include 'blocs/default.php';

            if($level<=3){
                include 'blocs/dernieres-missions.php';
            }
        }else{
            $tab_alerte['error']="Il n'y a pas de projet à ce nom";
            include 'blocs/erreur.php';
        }
    }





include 'blocs/footer.php';


?>
