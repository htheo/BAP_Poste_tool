<?php

if(isset($pseudo) && $level<=3 || $_POST['cdc']){

    if(isset($_GET['action'])){

        switch($_GET['action']){
            
            case 'update':
                if(isset($_FILES['cdc']) AND isset($_POST['pitch']) AND isset($_POST['deadline'])){
                    $erreur = "";
                    $extensions_valides = array( 'doc' , 'docx' , 'pdf' , 'odt', 'pages', 'txt' );
                    $extension_upload = strtolower(  substr(  strrchr($_FILES['cdc']['name'], '.')  ,1)  );
                    if ( in_array($extension_upload,$extensions_valides) ){
                        $info = "Extension correcte";
                    } else {
                        $erreur = "Extension refusé";
                    }
                    $maxwidth = 1048576;
                    $image_sizes = getimagesize($_FILES['cdc']['tmp_name']);
                    if ($image_sizes[0] > $maxwidth) $erreur = "Image trop grande";
                        
                    if($erreur != ""){
                        echo '<h2>'.$erreur.'</h2>';
                    } else {
                        //On enregistre le fichier
                        $nom = "cdc/{$nom_projet}.{$extension_upload}";
                        $resultat = move_uploaded_file($_FILES['cdc']['tmp_name'], $nom);
                    }
                    $pitch = htmlentities($_POST['pitch']);
                    $deadline=htmlentities($_POST['deadline']);
                    $id = $donnees_projet[0]['id'];
                    echo $id;

                    $update = db_update('projet_bap', array('cdc_link'=>$nom, 'pitch'=>$pitch, 'deadline' => $deadline, 'statut' => 'en_cours'), array('id' => $id));

                    if(isset($update)) {
                        echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
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