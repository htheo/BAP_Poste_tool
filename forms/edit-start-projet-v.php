<?php


if(isset($pseudo) && $level<=3 || $_POST['cdc']){

    if(isset($_GET['action'])){

        switch($_GET['action']){
            
            case 'update':
                if(isset($_FILES['cdc']) AND isset($_POST['pitch']) AND isset($_POST['deadline']) AND isset($_POST['created_at'])){

                    $nom_cdc = uploadAction('cdc', $nom_projet);

                    if(isset($_FILES['gantt'])){
                        $nom_gantt =  uploadAction('gantt', $nom_projet);
                    }

                    $pitch = htmlentities($_POST['pitch']);
                    $deadline=htmlentities($_POST['deadline']);
                    $created_at=htmlentities($_POST['created_at']);
                    $id = $donnees_projet[0]['id'];
                    $update = db_update('projet_bap', array('cdc_link'=>$nom_cdc, 'pitch'=>$pitch, 'deadline' => $deadline, 'statut' => 'en_cours', 'created_at' =>$created_at, 'gantt_link' => $nom_gantt), array('id' => $id));

                    if(isset($update)) {
                        echo 'Validé ! <script>  window.location.href = "home/suivi-projet.php";</script> <a href="home/suivi-projet.php">Cliquez-ici pour valider</a>';
                    }
                }else{
                    $nom = NULL;
                    $pitch = NULL;
                    $deadline = NULL;
                }

                break;
            
        }
    }
}else{
    $tab_alerte['error']= "Vous n'avez pas les droits";
    include 'blocs/erreur.php';
}

function uploadAction($name, $nom_projet){
    $erreur = "";
    $extensions_valides = array( 'doc' , 'docx' , 'pdf' , 'odt', 'pages', 'txt' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES[$name]['name'], '.')  ,1)  );
    if ( in_array($extension_upload,$extensions_valides) ){
        $info = "Extension correcte";
    } else {
        $erreur = "Extension refusé";
    }
    $maxwidth = 1048576;
    $image_sizes = getimagesize($_FILES[$name]['tmp_name']);
    if ($image_sizes[0] > $maxwidth) $erreur = "Image trop grande";

    if($erreur != ""){
        echo '<h2>'.$erreur.'</h2>';
    } else {
        //On enregistre le fichier
        $nom = "cdc/{$nom_projet}-{$name}.{$extension_upload}";
        $resultat = move_uploaded_file($_FILES[$name]['tmp_name'], $nom);
    }

    return $nom;
}