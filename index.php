<?php
session_start();
$tab_alerte=array();
include 'includes/baseconnect.php';
include 'includes/config.php';
include 'includes/functions.php';

$url_barre='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$tab_url_barre=explode('/',$url_barre);
//print_r($tab_url_barre);
$nom_page_all_in_url=$tab_url_barre[sizeof($tab_url_barre)-1];

$tab_page_all_in_url=explode('?',$nom_page_all_in_url);
$nom_page=$tab_page_all_in_url[0];

if(isset($_SESSION['pseudo']) && isset($_SESSION['id']) && isset($_SESSION['level'])){
    $pseudo = $_SESSION['pseudo'];
    $id = $_SESSION['id'];
    $level = $_SESSION['level'];
}

if (empty($nom_page)){
    $nom_page='home.php';
    $template=$nom_page;
    }
else{
    if (is_file('templates/'.$nom_page)){
        $template=$nom_page;
        }
        else{
            $template='404.php';
        }
    }




include 'templates/'.$template;
?>