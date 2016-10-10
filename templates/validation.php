<?php
/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 10/10/16
 * Time: 11:28
 */
if(isset($panel)){
    switch ($panel){
        case 'mail_existant_insert_bap':
            if(isset($select_mail_existant[0])&&$id_bap){
                $mail_user_insert_bap=$select_mail_existant[0]['mail'];
                $nom_user_insert_bap=$select_mail_existant[0]['nom'];
                $prenom_user_insert_bap=$select_mail_existant[0]['prenom'];
                $id_user_insert_bap=$select_mail_existant[0]['id'];

                include 'forms/insert-user-bap.php';
            }else{
                $tab_alerte['error']="Problème pas de mail existant";
                include 'blocs/erreur.php';
            }

            break;
        default:
            $tab_alerte['error']="Nous n'avons pas compris ce que vous aviez l'intention de faire";
            include 'blocs/erreur.php';
            break;
    }

}else{
    $tab_alerte['error']="Vous n'avez pas de raison d'être ici";
    include 'blocs/erreur.php';
}