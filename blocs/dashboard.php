 <?php
 if(isset($pseudo)){
 

    echo' <div class="big container">';
    if ($id == 0){
        $tab_alerte['error'] = "Vous n'avez pas les droits" ;
        include 'blocs/erreur.php';
    }else{
        echo '<h1>Bienvenue <b>'.$pseudo.'</b></h1>';
        echo '<hr>';
       echo  '<p>Vous pourrez gérer ici vos horaires et autres textes de votre site.</p>';
        // On récupère les posts existants


        if($level==1){
            $users = db_select('SELECT * FROM users');
            include 'forms/edit-table-users.php';

            $rows = db_select('SELECT * FROM posts');
            include 'forms/edit-table-cr.php';
        }else if($level<=3){

            $rows = db_select('SELECT * FROM posts');
            include 'forms/show-table-cr.php';
        }





    echo '</div>';
        
    }
    
}
?>