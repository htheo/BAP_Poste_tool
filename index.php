<?php
session_start();
$tab_alerte=array();  // tableau pour afficher les alertes (souvent erreur)
include 'includes/baseconnect.php';
include 'includes/config.php';
include 'includes/functions.php';

$url_barre=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //on récupère toutes les données
$tab_url_barre=explode('/',$url_barre);    // on les sépare dans un tableau avec les "/"
$i=0;
$nom_domaine=false;   //pour trouver le nom de domaine
$niveau_url="";
$niveau_url2="";
foreach ($tab_url_barre as $key => $value) {  // boucle pour prendre toutes les infos
    if($nom_domaine==true){                     // à partir de la on a les infos utile de la racine
        switch ($i) {
            case 0:
                $enlever_get=explode('?',$value);
                $nom_projet=$enlever_get[0];   //première valeur -> surement un projet

                break;
            case 1:
                $enlever_get=explode('?',$value);
                $nom_page=$enlever_get[0];     //deuxième -> nom de la page
                $niveau_url="../";
                break;
            case 2:
                $enlever_get=explode('?',$value);
                $donnees_url=$enlever_get[0];  // troisième valeur
                $niveau_url="../../";
                $niveau_url2="../";

                $nom_page=$nom_page.'.php';
                break;
            default:
                # code...
                break;
        }
        $i++;
    }else if($value=='BAP-tools'){
        $nom_domaine=true;
    }
}
if(isset($_SESSION['pseudo']) && isset($_SESSION['id']) && isset($_SESSION['level'])){   // si on est connecté
    $pseudo = $_SESSION['pseudo'];
    $id = $_SESSION['id'];
    $level = $_SESSION['level'];

    //on récupère le projet de la personne connecté
    $id_projet=db_select('SELECT id_projet, role FROM link_projet_user WHERE id_user='.$id);
    if(isset($id_projet[0])){
        $users_projet=db_select('SELECT * FROM projet_bap WHERE id='.$id_projet[0]['id_projet']);
        if(isset($users_projet[0])){
            $name_projet=$users_projet[0]['name'];
        }
    }
}else{  //sinon niveau visiteur
    $level=4;
}
if($nom_projet!=""){   // si il y a un nom de projet
    $nom_projet_clear=routeToName($nom_projet);
    $donnees_projet=db_select('SELECT * FROM projet_bap WHERE name="'.$nom_projet_clear.'"');


    if(isset($donnees_projet[0])){   // si il y a un projet à ce nom
        if (empty($nom_page)){

            $nom_page='home.php';
            $template=$nom_page;
        }
        else{

            if (is_file('templates/'.$nom_page)){   //si il y a bien un fichier eistant à ce nom

                $template=$nom_page;
            }
            else{
                $tab_alerte['error']="cette page n'existe pas";
                $template='404.php';
            }
        }
    }else{     //on n'a pas trouvé de projet existant c'est donc une page de l'accueil
        if(isset($_GET['panel'])){
            $template='home.php';        // on rentre dans le controller HOME
        }else{
            $nom_page_accueil=$nom_projet;
            if($nom_page_accueil=="connexion.php"){
                $template='connexion.php';
            }else if($nom_page_accueil=="inscription.php"){
                $template='inscription.php';
            }else {
                $template='accueil.php';        // on rentre dans le controller de l'accueil
            }

        }

    }

}else{
    $template='accueil.php';
}




include 'templates/'.$template;

?>



