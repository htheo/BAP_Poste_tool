<?php
/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 01/10/16
 * Time: 12:33
 */
include 'blocs/header-start.php';
include 'blocs/nav-accueil.php';

if(isset($nom_page_accueil)){
    switch ($nom_page_accueil){
        case 'accueil.php':
            include 'blocs/accueil.php';
            break;
        case 'listing-projet.php':
            $projets=db_select('SELECT * FROM projet_bap');
            include 'blocs/liste-projet.php';
            break;
        case 'creer-projet.php':
            if(isset($pseudo)){ //si il est déjà co il peut créer un projet
                include 'blocs/creer-projet.php';
            }                   //sinon il doit se connecter d'abord
            include 'blocs/creer-projet.php';
            break;
    }
}else{
    include 'blocs/accueil.php';
}

