<?php

if(isset($pseudo) && $level<=3 || $_POST['cdc']){

    if(isset($_GET['action'])){

        switch($_GET['action']){
            
            case 'update':
                if(isset($_FILES['cdc']) AND isset($_POST['pitch']) AND isset($_POST['deadline'])){
                    $erreur = "";
                  
                    $extensions_valides = array( 'doc' , 'docx' , 'pdf' , 'odt', 'pages', 'txt' );
                    //1. strrchr renvoie l'extension avec le point (« . »).
                    //2. substr(chaine,1) ignore le premier caractère de chaine.
                    //3. strtolower met l'extension en minuscules.
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
                    $cdc_link = htmlentities($_FILES['cdc']['name']);
                    $pitch = htmlentities($_POST['pitch']);
                    $deadline=htmlentities($_POST['deadline']);
                    $id = $donnees_projet[0]['id'];
                    echo $id;

                    $insert = db_update('projet_bap', array('cdc_link'=>$cdc_link, 'pitch'=>$pitch, 'deadline' => $deadline), array('id' => $id));
                    
                }else{
                    $name = NULL;
                    $brief = NULL;
                    $date = NULL;
                }

                break;
            
        }
    }
}else{
    $tab_alerte['error']= "Vous n'avez pas les droits";
    include 'blocs/erreur.php';
}