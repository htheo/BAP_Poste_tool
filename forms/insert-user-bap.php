<?php
if(isset($id_user_insert_bap)){
    echo '<div class="connection">';
    echo'<h1>Un mail au nom de '.$prenom_user_insert_bap.' '.$nom_user_insert_bap.' existe déjà</h1>';
    echo '<form method="post" action="admin.php?action=insert_user_into_bap&panel=edit-users">
        <h4>Voulez vous intégrer cette personne dans votre BAP ?</h4>
    
        <p class="connect">
            <label for="id_user_bap"></label><input name="id_user_bap" value="'.$id_user_insert_bap.'" type="hidden" id="id_user_bap"/><br />
            <label for="id_bap"></label><input name="id_bap" value="'.$id_bap.'" type="hidden" id="id_bap"/><br />
            
        </p>
        <p class="connect-submit"><input type="submit" value="Valider" /></p>
        <p class="connect-submit"><a href="../">Annuler</a></p>
        
        
    </form>
</div>';
}else{
    $tab_alerte['error']="Vous n'avez rien à faire ici";
    include 'blocs/erreur.php';
}


?>