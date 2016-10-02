<?php

if(isset($pseudo)&&$level<=1){
    if(isset($_GET['action'])){

        switch($_GET['action']){


            case 'update':
                if(isset($_POST['updatename']) AND isset($_POST['updatebrief'])){
                    $id = htmlentities($_POST['id']);
                    $name = htmlentities($_POST['updatename']);
                    $brief = htmlentities($_POST['updatebrief']);
                    $update = db_update('projet_bap', array('name'=>$name, 'brief'=>$brief), array('id'=>$id));
                    if(isset($update)){
                        echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
                    }else{
                        $tab_alerte['error']= "Problème lors de l'update";
                        include 'blocs/erreur.php';
                    }
                }



                break;




            case 'insert':
                if(isset($_POST['name']) AND isset($_POST['brief'])){
                    $name=htmlentities($_POST['name']);
                    $brief=htmlentities($_POST['brief']);
                    $insert = db_insert('projet_bap', array('name'=>$name, 'brief'=>$brief));
                    if(isset($insert)){
                        if(isset($id)){
                            db_update('users_bap', array('id_projet'=>$insert),array('id'=>$id));
                            echo 'Validé ! <script>  window.location.href = "accueil.php";</script> <a href="accueil.php">Cliquez-ici pour valider</a>';

                        }else{
                            $tab_alerte['error']= "Problème lors de l'insertion";
                            include 'blocs/erreur.php';
                        }
                    }else{
                    $tab_alerte['error']= "Problème lors de l'insertion";
                    include 'blocs/erreur.php';
                    }
                }else{
                    $name = NULL;
                    $brief = NULL;
                    $date = NULL;
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